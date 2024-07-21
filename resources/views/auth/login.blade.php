<head>
    @vite(['resources/css/app.css'])
</head>

<body class="h-full">
    <div class="flex min-h-full flex-col justify-center">
        <div class="h-screen flex">
            <div class="hidden lg:flex w-full lg:w-1/2 login_img_section justify-around items-center">
                <div class="bg-black opacity-20 inset-0 z-0"></div>
                <div class="w-full mx-auto px-20 flex-col items-center space-y-6">
                    <h1 class="text-white font-bold text-4xl font-sans">Bem-vindo ao <strong> Seu
                            Ponto</strong>.<br><br> Um sistema de registro de
                        ponto mais intuitivo e eficiente do mercado.</h1>
                    <p class="text-white mt-1"><br><strong>* </strong> Fácil usabilidade</p>
                </div>
            </div>
            <div class="flex w-full lg:w-1/2 justify-center items-center bg-white space-y-8">
                <div class="w-full px-8 md:px-32 text-center lg:px-24">
                    <div class="logo w-24 h-24 mx-auto mb-4"></div> <!-- Adiciona a logo aqui -->

                    <h1 class="text-gray-800 font-bold text-2xl mb-1">Olá novamente!</h1>

                    <form class="bg-white rounded-md shadow-2xl p-5" style="margin-top: 30px"
                        action="{{ route('login') }}" method="post" id="form-logtou">
                        @csrf
                        <div class="flex items-center border-2 mb-3 py-2 px-3 rounded-2xl">
                            <input class="pl-2 w-full" type="email" name="email" placeholder="E-mail">
                        </div>

                        <div class="flex items-center border-2 mb-8 py-2 px-3 rounded-2xl">
                            <input class="pl-2 w-full" type="password" name="password" placeholder="Senha">
                        </div>

                        <button
                            class="block w-full bg-indigo-600 mt-5 py-2 rounded-2xl hover:bg-indigo-700 hover:-translate-y-1 transition-all duration-500 text-white font-semibold mb-2"
                            type="submit">Entrar</button>
                    </form>
                </div>
            </div>

            <div style="margin-top: 20px">
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div style="margin-top: 30px">
                @include('shared.message')
            </div>

        </div>
    </div>
    </div>

    </div>

</body>
