*** Settings ***
Library    SeleniumLibrary
Task Setup    Setup
Task Teardown    Teardown

*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/hero

${wait-seconds}        15 seconds
${wait-not-exist-seconds}    5 seconds
${retry-interval-ms}        500 ms

${link-services}       xpath://span[contains(text(),'SERVICES')]
${link-login}          xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]

${input-email}         xpath://input[@id='email']
${input-pass}          xpath://input[@id='password']  
${input-title}         xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[1]/input[1]
${input-content}       xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[2]/textarea[1]

${btn-login}           xpath://button[contains(text(),'Log in')]
${btn-save}            xpath://button[contains(text(),'SAVE')]
${btn-confirm}         xpath://button[contains(text(),'CONFIRM')]

${modal-success}       xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]

${admin-email}         stephany39@example.org
${admin-pass}          password
${admin-span}          xpath://span[contains(text(),'FINN')]

${guest-email}         sanford.laverne@example.org
${guest-pass}          password
${guest-span}          xpath://span[contains(text(),'LANDEN')]

${services-1}          xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/a[1]
${services-1-editBtn}  xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/a[1]/button[1]

${msg-alert}           All fields must be filled.   

*** Test Cases ***
If user is admin, edit button is present
    Login as Admin
    
    Go To Services

    Wait Until Page Contains Element    ${services-1-editBtn}    ${wait-seconds}

    Element Should Be Visible   ${services-1-editBtn}

If title field is missing, alert is shown
    Login as Admin
    
    Go To Services

    Click service 1 edit button

    Wait for input value to load    ${input-title}
    
    Press Keys  ${input-title}   CTRL+a   BACKSPACE    

    Do Update

    Alert Should Be Present    ${msg-alert}    

If content field is missing, alert is shown
    Login as Admin
    
    Go To Services

    Click service 1 edit button

    Wait for input value to load    ${input-content}
    
    Press Keys  ${input-content}   CTRL+a   BACKSPACE    

    Do Update

    Alert Should Be Present    ${msg-alert}    

If all fields are filled, do update
    Login as Admin
    
    Go To Services

    Click service 1 edit button

    Wait for input value to load    ${input-title}

    Input Text        ${input-title}    Testing title

    Input Text        ${input-content}    Testing content
    
    Do Update

    Wait Until Page Contains Element    ${modal-success}    ${wait-seconds}

    Element Should Be Visible    ${modal-success}


If user is not admin, edit button is absent
    Login as Guest
    
    Go To Services

    Wait Until Page Does Not Contain Element   ${services-1-editBtn}    ${wait-not-exist-seconds}  
    

*** Keywords ***
Login as Admin
    Click link        ${link-login}
    Input Text        ${input-email}    ${admin-email}
    Input Text        ${input-pass}     ${admin-pass}
    Click Button      ${btn-login}
    Wait Until Page Contains Element    ${admin-span}    ${wait-seconds}

Login as Guest
    Click link        ${link-login}
    Input Text        ${input-email}    ${guest-email}
    Input Text        ${input-pass}     ${guest-pass}
    Click Button      ${btn-login}

Go to Services
    Wait Until Page Contains Element    ${link-services}    ${wait-seconds}
    Click Element        ${link-services}

Click service 1 edit button
    Wait Until Page Contains Element    ${services-1-editBtn}    ${wait-seconds}
    Click Button    ${services-1-editBtn}

Wait for input value to load
    [Arguments]    ${elem}
    Wait Until Keyword Succeeds    ${wait-seconds}    ${retry-interval-ms}    Input must not be empty    ${elem}
    
Input must not be empty
    [Arguments]    ${elem}
    ${actual value}=    Get Element Attribute    ${elem}    value
    Should Not Be Empty    ${actual value}

Do Update
    Click Button    ${btn-save} 
    Wait Until Page Contains Element    ${btn-confirm}    ${wait-seconds}
    Click Button    ${btn-confirm}

Teardown
    Close Browser

Setup
    Open Browser    ${url}    ${browser}