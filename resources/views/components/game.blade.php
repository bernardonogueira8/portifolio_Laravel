<div class="bg-[#1b1f2b] p-6 rounded-xl shadow-lg w-full max-w-sm area">
    <div class="mb-4 space-y-2 text-sm text-center">
        <div class="hidden text-red-400" id="alertErro">Aposta inválida!</div>
        <div class="hidden text-yellow-400 " id="alertSmall">👀 O número para ser encontrado é MENOR 😰
        </div>
        <div class="hidden text-yellow-400 " id="alertBig">👀 O número para ser encontrado é MAIOR 😨
        </div>
        <div class="hidden text-green-400" id="alertSuccess">Parabéns!</div>
    </div>

    <div class="mb-3 text-lg font-semibold text-center">
        Descubra o número de 1 a 100 🎲
    </div>

    <div class="flex justify-center mb-4">
        <input type="number" min="1" max="100"
            class="w-full max-w-[200px] px-4 py-2 text-center text-black rounded" id="bet"
            placeholder="Digite um número">
    </div>

    <div class="text-center">
        <button id="btn" class="px-4 py-2 font-bold text-black bg-yellow-400 rounded hover:bg-yellow-500"
            onclick="verifyNumber()">Enviar</button>
    </div>
</div>

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let numberToFind = Math.floor(Math.random() * 100) + 1;
            let attempt = 0;

            const alertErro = document.getElementById("alertErro");
            const alertBig = document.getElementById("alertBig");
            const alertSmall = document.getElementById("alertSmall");
            const alertSuccess = document.getElementById("alertSuccess");
            const button = document.getElementById("btn");
            const area = document.querySelector(".area");

            function buttonOff() {
                button?.classList.add("placeholder", "disabled");
            }

            function buttonOn() {
                button?.classList.remove("placeholder", "disabled");
            }

            function alertClean() {
                [alertErro, alertBig, alertSmall, alertSuccess].forEach(el => el?.classList.add("hidden"));
                area?.classList.remove("animate__animated", "animate__shakeX", "animate__rubberBand");
            }

            function refresh() {
                numberToFind = Math.floor(Math.random() * 100) + 1;
            }

            function showAnimatedAlert(alertElement, animationClass) {
                alertElement.classList.remove("hidden");
                area.classList.remove("animate__animated", animationClass); // remove anterior
                void area.offsetWidth; // forçar reflow
                area.classList.add("animate__animated", animationClass);
            }

            window.verifyNumber = function() {
                const bet = parseInt(document.getElementById("bet").value);
                alertClean();
                buttonOff();

                if (isNaN(bet) || bet < 1 || bet > 100) {
                    setTimeout(() => {
                        showAnimatedAlert(alertErro, "animate__shakeX");
                        buttonOn();
                    }, 300);
                    return;
                }

                attempt++;

                if (bet < numberToFind) {
                    setTimeout(() => {
                        alertBig.classList.remove("hidden");
                        alertSmall.classList.add("animate__animated", "animate__shakeX");
                        buttonOn();
                    }, 300);
                } else if (bet > numberToFind) {
                    setTimeout(() => {
                        alertSmall.classList.remove("hidden");
                        alertSmall.classList.add("animate__animated", "animate__shakeX");
                        buttonOn();
                    }, 300);
                } else {
                    setTimeout(() => {
                        alertSuccess.innerHTML =
                            `🪐 Parabéns! Você acertou com ${attempt - 1} erro(s).`;
                        showAnimatedAlert(alertSuccess, "animate__rubberBand");
                        buttonOn();
                        refresh();
                        attempt = 0;
                    }, 300);
                }
            };

            document.addEventListener('keypress', (e) => {
                if (e.key === "Enter") {
                    window.verifyNumber();
                }
            });
        });
    </script>
@endsection
