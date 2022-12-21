*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/hero


*** Test Cases ***
Title of Service Edit Page
    Open Browser        ${url}    ${browser}
    Click Link          ${link-hero}

    # Element Text Should Be    xpath://h1[contains(text(),'Edit Service')]     Edit Service
    # Element Text Should Be    xpath://label[contains(text(),'Title')]    Title

*** Keywords ***
# open_Browser
    # Open Browser    ${url}    ${browser}