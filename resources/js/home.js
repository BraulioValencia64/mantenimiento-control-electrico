import.meta.glob([
    '../images/**',
]);

import * as THREE from 'three';

const vertexShader = `
    varying vec2 vUv;

    void main() {
        vUv = uv;
        gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
    }
`;

const fragmentShader = `
    uniform sampler2D uTexture;
    uniform float uTime;
    varying vec2 vUv;

    void main() {
        vec4 color = texture2D(uTexture, vUv);

        // Detect warm pixels (yellow/orange: high R+G, low B)
        float warmth = (color.r + color.g) * 0.5 - color.b;
        float isBolt = smoothstep(0.2, 0.45, warmth) * step(0.25, color.r);

        // Also detect bright/white pixels within the bolt area
        float brightness = (color.r + color.g + color.b) / 3.0;
        float isWhiteBolt = step(0.7, brightness) * step(0.1, warmth);
        isBolt = max(isBolt, isWhiteBolt);

        // Alternating pulse: 0 = off/dark, 1 = on/bright
        float pulse = sin(uTime * 1.5) * 0.5 + 0.5;

        // Dim bolt to dark when off, full brightness + glow when on
        float dimFactor = mix(0.15, 1.0, pulse);
        vec3 glowColor = vec3(1.0, 0.85, 0.2);
        vec3 boltColor = color.rgb * dimFactor + glowColor * pulse * 0.35;

        color.rgb = mix(color.rgb, boltColor, isBolt);

        // Make dark pixels transparent so the page background shows through
        float luma = dot(color.rgb, vec3(0.299, 0.587, 0.114));
        color.a = smoothstep(0.03, 0.15, luma);

        gl_FragColor = color;
    }
`;

function initBannerAnimation() {
    const container = document.getElementById('banner-container');
    if (!container) return;

    const bannerUrl = container.dataset.bannerUrl;
    if (!bannerUrl) return;

    // Scene setup
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(45, container.clientWidth / container.clientHeight, 0.1, 100);
    camera.position.z = 1.8;

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setClearColor(0x000000, 0);
    container.appendChild(renderer.domElement);

    // Uniforms
    const uniforms = {
        uTime: { value: 0 },
        uTexture: { value: null },
    };

    // Load texture and create mesh
    const loader = new THREE.TextureLoader();
    loader.load(bannerUrl, (texture) => {
        uniforms.uTexture.value = texture;

        // Calculate aspect ratio to fit image properly
        const imgAspect = texture.image.width / texture.image.height;
        const containerAspect = container.clientWidth / container.clientHeight;

        let planeWidth, planeHeight;
        if (containerAspect > imgAspect) {
            planeHeight = 1.8;
            planeWidth = planeHeight * imgAspect;
        } else {
            planeWidth = 1.8 * containerAspect;
            planeHeight = planeWidth / imgAspect;
        }

        const geometry = new THREE.PlaneGeometry(planeWidth, planeHeight, 64, 64);
        const material = new THREE.ShaderMaterial({
            vertexShader,
            fragmentShader,
            uniforms,
            transparent: true,
        });

        const mesh = new THREE.Mesh(geometry, material);
        scene.add(mesh);
    });

    // Resize handler
    window.addEventListener('resize', () => {
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });

    // Animation loop
    const clock = new THREE.Clock();
    function animate() {
        requestAnimationFrame(animate);

        uniforms.uTime.value = clock.getElapsedTime();
        renderer.render(scene, camera);
    }
    animate();
}

// Initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initBannerAnimation);
} else {
    initBannerAnimation();
}
