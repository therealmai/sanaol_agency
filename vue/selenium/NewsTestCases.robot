*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/hero
${Add-articles}        xpath://button[contains(text(),'Add Articles')]
${Delete-news}         xpath://body/div[3]/div[1]/div[2]/div[1]/button[1]
${Edit-news}           xpath://body/div[3]/div[1]/div[2]/div[1]/button[2]

*** Test Cases ***
Title of News Edit Page
    Open Browser        ${url}    ${browser}
                # it doesnt work since it has no links yet
    Click Link          ${Add-articles}
    Click Link          ${Delete-news}
    Click Link          ${Edit-news}
                # it checks out
    Element Text Should Be  xpath://[contains(text(),'Add Articles')]            Add-articles
    Element Text Should Be  xpath://body/div[3]/div[1]/div[2]/div[1]/button[1]   Delete-news
    Element Text Should Be  xpath://body/div[3]/div[1]/div[2]/div[1]/button[2]   Edit-news

*** Keywords ***
# open_Browser
    # Open Browser    ${url}    ${browser}