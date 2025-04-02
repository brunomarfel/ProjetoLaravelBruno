<?php

use Laravel\Fortify\Features;

return [

    /*
    |--------------------------------------------------------------------------
    | Fortify Guard
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar qual guarda de autenticação o Fortify deve usar
    | ao autenticar os usuários. Este valor deve corresponder com um dos guardas
    | já presentes no seu arquivo de configuração "auth".
    |
    */

    'guard' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Fortify Password Broker
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar qual corretor de senha o Fortify pode usar
    | quando um usuário estiver resetando sua senha. O valor configurado deve
    | corresponder a um dos corretores de senha configurados no seu arquivo "auth".
    |
    */

    'passwords' => 'users',

    /*
    |--------------------------------------------------------------------------
    | Username / Email
    |--------------------------------------------------------------------------
    |
    | Este valor define qual atributo do modelo deve ser considerado como o
    | "username" do seu aplicativo. Normalmente, esse pode ser o endereço de e-mail
    | dos usuários, mas você pode alterar esse valor, se necessário.
    |
    | Por padrão, o Fortify espera que o campo de "esqueci a senha" e "resetar senha"
    | tenha um campo nomeado 'email'. Se a aplicação usar outro nome para o campo,
    | você pode definir aqui.
    |
    */

    'username' => 'email',
    'email' => 'email',

    /*
    |--------------------------------------------------------------------------
    | Lowercase Usernames
    |--------------------------------------------------------------------------
    |
    | Este valor define se os usernames devem ser convertidos para minúsculas antes de
    | serem salvos no banco de dados, já que alguns sistemas de banco de dados são sensíveis
    | a maiúsculas e minúsculas. Você pode desabilitar isso, se necessário.
    |
    */

    'lowercase_usernames' => true,

    /*
    |--------------------------------------------------------------------------
    | Caminho da Página Inicial
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar o caminho para onde os usuários serão redirecionados
    | após a autenticação ou o reset de senha, quando a operação for bem-sucedida.
    |
    */

    'home' => '/dashboard', // Redirecionamento após login

    /*
    |--------------------------------------------------------------------------
    | Prefixo de Rotas do Fortify
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar qual prefixo o Fortify usará para todas as rotas
    | que registra com o aplicativo. Se necessário, você pode mudar o subdomínio
    | sob o qual todas as rotas do Fortify estarão disponíveis.
    |
    */

    'prefix' => '',

    'domain' => null,

    /*
    |--------------------------------------------------------------------------
    | Middleware das Rotas do Fortify
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar qual middleware o Fortify usará para as rotas
    | que ele registrar. Normalmente, o padrão fornecido é preferido.
    |
    */

    'middleware' => ['web'],

    /*
    |--------------------------------------------------------------------------
    | Limitação de Taxa
    |--------------------------------------------------------------------------
    |
    | Por padrão, o Fortify limita os logins a cinco tentativas por minuto para
    | cada combinação de e-mail e endereço IP. Se você quiser especificar um
    | limitador de taxa personalizado, pode definir aqui.
    |
    */

    'limiters' => [
        'login' => 'login',
        'two-factor' => 'two-factor',
    ],

    /*
    |--------------------------------------------------------------------------
    | Visualização de Rotas de Registro
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar se as rotas que retornam visualizações devem ser
    | desativadas, caso você não precise delas ao construir sua própria aplicação.
    | Isso pode ser útil, especialmente ao escrever uma aplicação de página única.
    |
    */

    'views' => true,

    /*
    |--------------------------------------------------------------------------
    | Funcionalidades
    |--------------------------------------------------------------------------
    |
    | Algumas funcionalidades do Fortify são opcionais. Você pode desabilitar essas
    | funcionalidades removendo-as dessa lista. Você pode escolher desabilitar apenas
    | algumas dessas funcionalidades ou até mesmo todas, se necessário.
    |
    */

    'features' => [
        Features::registration(),
        Features::resetPasswords(),
        Features::updateProfileInformation(),
        Features::updatePasswords(),
        Features::twoFactorAuthentication([
            'confirm' => true,
            'confirmPassword' => true,
            // 'window' => 0, // Configure a janela de dois fatores, se necessário
        ]),
    ],

];
