*** Settings ***
Library    SeleniumLibrary
Task Setup    Open Browser    ${url}    ${browser}
Task Teardown    Teardown
*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/hero
${Add-articles}        xpath://button[contains(text(),'Add Articles')]
${Delete-news}         xpath://body/div[3]/div[1]/div[2]/div[1]/button[1]
${Edit-news}           xpath://body/div[3]/div[1]/div[2]/div[1]/button[2]
${msg-alert}           Unexpected error.
${speed-slow}          0.75 seconds
${link-login}          xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]/span[1]
${input-email}         xpath://input[@id='email']
${input-pass}          xpath://input[@id='password']
${admin-email}         Marcus_aureliues@example.net
${admin-pass}          password
${btn-login}           xpath://button[contains(text(),'Log in')]
${guest-email}         Julius.caesar@example.com
${guest-pass}          password
${news}                xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[4]
${msg-alert}           Failed to do task.

*** Test Cases ***
if user is admin set btns as visible
    login as admin

    Set Selenium Speed    ${speed-slow}
    
    Go to News

    Element Should Be Visible  ${Add-articles} ${Delete-news} ${Edit-news}

if add articles failed
    login as admin
    
    Set Selenium Speed     ${speed-slow}
    
    Go to News

    Alert Should Be Present    ${msg-alert}

if delete news failed
    login as admin

    Set Selenium Speed     ${speed-slow}
    
    Go to News

    Alert Should Be Present    ${msg-alert}


if edit news failed 
    login as admin

    Set Selenium Speed     ${speed-slow}
    
    Go to News

    Alert Should Be Present    ${msg-alert}

if user is not admin set btns as invisible
    Login as Guest

    Set Selenium Speed    ${speed-slow}
    
    Go to News

    Element Should Not Be Visible   ${Add-articles} ${Delete-news} ${Edit-news}

*** Keywords ***
# open_Browser
    # Open Browser    ${url}    ${browser}
login as admin
    Click Element     ${link-login}
    # Sleep              5 seconds
    Input Text        ${input-email}    ${admin-email}
    # Sleep              5 seconds
    Input Text        ${input-pass}     ${admin-pass}
    # Sleep              5 seconds
    Click Button      ${btn-login}

Login as Guest
    Click Element     ${link-login}
    Input Text        ${input-email}    ${guest-email}
    Input Text        ${input-pass}     ${guest-pass}
    Click Button      ${btn-login}

Go to News
    Click Link   ${news}

Teardown
    Set Selenium Speed    0.1 seconds
    Close Browser 