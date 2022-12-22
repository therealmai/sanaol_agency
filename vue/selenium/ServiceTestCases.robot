*** Settings ***
Library    SeleniumLibrary
Task Setup    Open Browser    ${url}    ${browser}
Task Teardown    Teardown

*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/hero
${speed-slow}          0.65 seconds

${link-services}       xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[2]/a[6]
${link-login}          xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[2]/a[8]

${input-email}         xpath://input[@id='email']
${input-pass}          xpath://input[@id='password']  
${input-title}         xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[1]/input[1]
${input-content}       xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[2]/textarea[1]

${btn-login}           xpath://button[contains(text(),'Log in')]
${btn-save}            xpath://button[contains(text(),'SAVE')]
${btn-confirm}         xpath://button[contains(text(),'CONFIRM')]

${modal-success}       xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]

${admin-email}         bernhard.bell@example.net
${admin-pass}          password

${guest-email}         justyn.kreiger@example.com
${guest-pass}          password

${services-1}          xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/a[1]
${services-1-editBtn}  xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/a[1]/button[1]

${msg-alert}           All fields must be filled.   

*** Test Cases ***
If user is admin, edit button is present
    Login as Admin

    Set Selenium Speed    ${speed-slow}
    
    Go To Services

    Element Should Be Visible   ${services-1-editBtn}

If title field is missing, alert is shown
    Login as Admin

    Set Selenium Speed    ${speed-slow}
    
    Go To Services

    Click Button    ${services-1-editBtn}

    Set Selenium Speed    0.1 seconds
    
    Press Keys  ${input-title}   CTRL+a   BACKSPACE    

    Do Update

    Alert Should Be Present    ${msg-alert}    

If content field is missing, alert is shown
    Login as Admin

    Set Selenium Speed    ${speed-slow}
    
    Go To Services

    Click Button    ${services-1-editBtn}

    Set Selenium Speed    0.1 seconds
    
    Press Keys  ${input-content}   CTRL+a   BACKSPACE    

    Do Update

    Alert Should Be Present    ${msg-alert}    

If all fields are filled, do update
    Login as Admin

    Set Selenium Speed    ${speed-slow}
    
    Go To Services

    Click Button    ${services-1-editBtn}

    Set Selenium Speed    0.1 seconds

    Input Text        ${input-title}    Testing title

    Input Text        ${input-content}    Testing content
    
    Do Update

    Element Should Be Visible    ${modal-success}


If user is not admin, edit button is absent
    Login as Guest

    Set Selenium Speed    ${speed-slow}
    
    Go To Services

    Element Should Not Be Visible   ${services-1-editBtn}
    

*** Keywords ***
Login as Admin
    Click link        ${link-login}
    Input Text        ${input-email}    ${admin-email}
    Input Text        ${input-pass}     ${admin-pass}
    Click Button      ${btn-login}

Login as Guest
    Click link        ${link-login}
    Input Text        ${input-email}    ${guest-email}
    Input Text        ${input-pass}     ${guest-pass}
    Click Button      ${btn-login}

Go to Services
    Click Link        ${link-services}
    
Do Update
    Click Button    ${btn-save} 
    Click Button    ${btn-confirm}

Teardown
    Set Selenium Speed    0.1 seconds
    Close Browser