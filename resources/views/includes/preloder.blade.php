<style>
    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .preloader {
        position: fixed;
        top: 0;
        right: 0;
        width: 100%;
        height: 100vh;
        z-index: 100;
    }

    .preloader-circle {
        display: block;
        position: absolute;
        top: 30%;
        left: 70%;
        width: 0;
        border-radius: 50%;
        aspect-ratio: 1;
        background-color: transparent;
        transform: translate(-50%, -50%);
    }

    .preloader-circle::before {
        content: '';
        position: absolute;
        box-sizing: content-box;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        aspect-ratio: 1;
        border-radius: 50%;
        background-color: transparent;
        border: 200vw solid #F9F7E8;
    }

    .preloader.start .preloader-circle {
        animation: anim-preloader 2s ease 0s forwards;
    }

    .preloader.start {
        animation: off-preloader 0s ease 1s forwards;
    }

    @keyframes anim-preloader {
        0% {
            width: 0;
        }

        100% {
            width: 400vw;
        }
    }

    @keyframes off-preloader {
        0% {
            position: fixed;
            z-index: 100;
        }

        99% {
            position: fixed;
            z-index: 100;
        }

        100% {
            display: none;
            pointer-events: none;
        }
    }

    @media(max-width: 900px) {
        .preloader.start .preloader-circle {
            animation: anim-preloader 2s ease 0s forwards;
        }
    }

    .square {
        position: absolute;
        width: 50px;
        height: 50px;
        border: 2px solid #77917f;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        transform-origin: center;
        animation: square-preloader 1s ease 0s infinite;
    }

    .square::before {
        content: '';
        position: absolute;
        width: 20px;
        height: 50px;
        border: 2px solid #77917f;
        top: -2px;
        left: 50%;
        transform: translateX(-50%);
    }

    .square::after {
        content: '';
        position: absolute;
        width: 50px;
        height: 20px;
        border: 2px solid #77917f;

        top: 50%;
        left: -2px;
        transform: translateY(-50%);
    }

    .preloader.start .square {
        animation: square-preloader 1s ease infinite, off-quare-preloader 0.2s ease 0s forwards;

    }

    @keyframes square-preloader {
        0% {
            transform: translate(-50%, -50%) rotate(0deg);
            top: 50%;
        }

        70% {
            transform: translate(-50%, -50%) rotate(360deg);
            top: 40%;
        }

        100% {
            transform: translate(-50%, -50%) rotate(360deg);
            top: 50%;
        }
    }

    @keyframes off-quare-preloader {
        0% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }
</style>