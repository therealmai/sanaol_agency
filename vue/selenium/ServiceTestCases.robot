*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/hero
${link-services}       xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[2]/a[6]
${services-1}          xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/a[1]


*** Test Cases ***
Title of Service Edit Page
    Open Browser        ${url}    ${browser}
    Click Link          ${link-services}
    Click Link          ${services-1}

    Element Text Should Be    xpath://h1[contains(text(),'Edit Service')]    Edit Service
    # Open_browser
    

*** Keywords ***
# open_Browser
    # Open Browser    ${url}    ${browser}