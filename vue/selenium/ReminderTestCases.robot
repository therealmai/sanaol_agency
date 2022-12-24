*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/hero
${services-1}          xpath://body/div[@id='app']/div[1]/div[1]
${serive-img}          xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/img[1]

*** Test Cases ***
Title of Service Edit Page
    Open Browser        ${url}    ${browser}
    Click Link          ${services-1}
    Click Link          ${service-img}

*** Keywords ***
# open_Browser
    # Open Browser    ${url}    ${browser}