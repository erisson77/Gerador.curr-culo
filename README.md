Gerador de Currículo em PHP e mPDF

Este projeto consiste em um sistema simples para a geração de currículos em formato PDF. A interface de preenchimento é limpa e desenvolvida com HTML, CSS e JavaScript (jQuery), enquanto a lógica de processamento e a conversão para PDF são realizadas com PHP e a biblioteca mPDF.

Funcionalidades Implementadas

* **Formulário Web:** Interface de entrada de dados para informações pessoais, resumo, experiências e formação.
* **Geração de PDF:** Conversão do formulário preenchido em um documento PDF final.
* **Campos Dinâmicos:** Usando JavaScript e jQuery, o usuário pode adicionar e remover dinamicamente campos de "Experiência Profissional" e "Formação Acadêmica".
* **Controle de Versão (Git):** O projeto está versionado com Git, ignorando arquivos desnecessários (como a pasta `vendor`).

Tecnologias Utilizadas

* **Frontend:**
    * HTML5
    * CSS3
    * JavaScript
    * jQuery (Para manipulação dinâmica do DOM)
* **Backend:**
    * PHP 8.4
    * mPDF: Biblioteca PHP utilizada para renderizar o HTML/CSS gerado e exportá-lo como um arquivo PDF.
    * Composer: Gerenciador de dependências do PHP (para instalar o mPDF).

Como Executar o Projeto

Para rodar este projeto, você precisa de um servidor local com suporte a PHP (como XAMPP, MAMP, ou o PHP Server do VS Code) e o Composer.

1.  **Clone o repositório:**
    ```bash
    git clone [https://github.com/errisson77/Gerador.curr-culo.git](https://github.com/errisson77/Gerador.curr-culo.git)
    ```
2.  **Acesse a pasta:**
    ```bash
    cd Gerador.curr-culo
    ```
3.  **Instale as dependências (mPDF):**
    *(Este comando lê o `composer.json` e baixa a pasta `vendor`)*
    ```bash
    composer install
    ```
4.  **Inicie um servidor PHP:**
    Use a extensão "PHP Server" do VS Code (clicando com o botão direito no `index.html`) ou use o terminal:
    ```bash
    php -S localhost:8000
    ```
5.  **Acesse no navegador:**
    Abra `http://localhost:8000`
