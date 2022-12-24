*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/hero
${general}             xpath://body/div[@id='app']/div[1]/div[1]/ul[1]/div[1]
${next-page}           xpath://body/div[@id='app']/div[1]/div[2]/nav[1]/ul[1]/li[8]/a[1]
${back-page}           xpath://body/div[@id='app']/div[1]/div[2]/nav[1]/ul[1]/li[1]/a[1]

*** Test Cases ***
Title of Service Edit Page
    Open Browser        ${url}    ${browser}
    Click Link          ${next-page}
    Click Link          ${back-page}
    

*** Keywords ***
# open_Browser
    # Open Browser    ${url}    ${browser}