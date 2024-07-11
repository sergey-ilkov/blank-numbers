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
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: 100;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .preloader-circle {
        position: absolute;
        display: block;
        top: 30%;
        left: 60%;
        width: 50vw;
        height: 50vw;
        transform: translate(-50%, -50%) scale(0.3);
        aspect-ratio: 1;
        background-color: #F9F7E8;

    }

    .preloader-circle::before {
        content: '';
        position: absolute;
        box-sizing: content-box;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        aspect-ratio: 1;
        border-radius: 50%;
        background-color: transparent;
        border: 500vh solid #F9F7E8;
    }

    .square {
        width: 50px;
        height: 50px;
        border: 2px solid #77917f;
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
        transition: opacity 0.2s ease;
        opacity: 0;

    }

    @keyframes square-preloader {
        0% {
            transform: translateY(0) rotate(0deg);
        }

        70% {
            transform: translateY(-50px) rotate(360deg);
        }

        100% {
            transform: translateY(0) rotate(360deg);
        }
    }




    .preloader.start .preloader-circle {
        animation: start 2s ease 0s forwards;
    }

    .preloader.start {
        animation: off 0s ease 1.4s forwards;
    }




    @keyframes start {
        0% {
            transform: translate(-50%, -50%) scale(0.3);
            background-color: #F9F7E8;
        }

        1% {
            transform: translate(-50%, -50%) scale(0.3);
            background-color: transparent;
        }


        100% {
            transform: translate(-50%, -50%) scale(10);
            background-color: transparent;
        }
    }

    @keyframes off {
        0% {
            z-index: 50;
        }

        99% {
            z-index: 50;
        }

        100% {
            display: none;
            pointer-events: none;
        }
    }
</style>