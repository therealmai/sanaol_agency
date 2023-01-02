*** Settings ***
Library    SeleniumLibrary
Task Setup    Setup
Task Teardown    Teardown

*** Variables ***
${browser}             Chrome
${url}                 http://localhost:5173/hero

${wait-seconds}        15 seconds
${wait-not-exist-seconds}    5 seconds
${retry-interval-ms}        500 ms

${link-login}          xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]

${herobanner-container}    xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]

${input-email}         xpath://input[@id='email']
${input-pass}          xpath://input[@id='password']
${input-admin-header}  xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[1]/input[1]
${input-admin-subheader}     xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[2]/textarea[1]
${input-general-header}      xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[3]/input[1]
${input-general-subheader}   xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[4]/textarea[1]

${select-1st}         xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[1]/select[1]
${select-2nd}         xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[2]/select[1]
${select-3rd}          xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[3]/select[1]

${btn-login}           xpath://button[contains(text(),'Log in')]
${btn-save}            xpath://button[contains(text(),'SAVE')]
${btn-confirm}         xpath://button[contains(text(),'CONFIRM')]
${btn-back}            xpath://button[contains(text(),'BACK')]
${btn-cancel}          xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[3]/button[2]

${modal-success}       xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]

${admin-email}         a@aa.com
${admin-pass}          password

${guest-email}         g@aa.com
${guest-pass}          password

${herobanner-1-editBtn}    xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[2]/div[1]/div[1]/a[1]/button[1]
${prevNews-editBtn}        xpath://button[contains(text(),'Edit Previous News')]

${msg-alert}           All fields must be filled.

*** Test Cases ***
If user is admin, update 1 herobanner
    Login as Admin
    Go to 1st shown herobanner
    Wait for input value to load    ${input-admin-header}
    Press Keys  ${input-admin-header}   CTRL+a   Testing admin header
    Press Keys  ${input-admin-subheader}   CTRL+a   Testing admin subheader
    Press Keys  ${input-general-header}   CTRL+a   Testing general header
    Press Keys  ${input-general-subheader}   CTRL+a   Testing general subheader
    Do Update
    Should show modal success

Back button must be working in "Edit Hero Banner" page
    Login as Admin
    Go to 1st shown herobanner
    Wait Until Page Contains Element    ${btn-back}    ${wait-seconds}
    Click Button    ${btn-back}
    Should be on homepage

Cancel button must be working in "Edit Hero Banner" page
    Login as Admin
    Go to 1st shown herobanner
    Wait Until Page Contains Element    ${btn-cancel}    ${wait-seconds}
    Click Button    ${btn-cancel}
    Should be on homepage

If admin header field is missing, alert is shown
    Login as Admin
    Go to 1st shown herobanner
    Wait for input value to load    ${input-admin-header}
    Press Keys  ${input-admin-header}   CTRL+a   BACKSPACE
    Do Update
    Alert Should Be Present    ${msg-alert}

If admin subheader field is missing, alert is shown
    Login as Admin
    Go to 1st shown herobanner
    Wait for input value to load    ${input-admin-subheader}
    Press Keys  ${input-admin-subheader}   CTRL+a   BACKSPACE
    Do Update
    Alert Should Be Present    ${msg-alert}

If general header field is missing, alert is shown
    Login as Admin
    Go to 1st shown herobanner
    Wait for input value to load    ${input-general-header}
    Press Keys  ${input-general-header}   CTRL+a   BACKSPACE
    Do Update
    Alert Should Be Present    ${msg-alert}

If general subheader field is missing, alert is shown
    Login as Admin
    Go to 1st shown herobanner
    Wait for input value to load    ${input-general-subheader}
    Press Keys  ${input-general-subheader}   CTRL+a   BACKSPACE
    Do Update
    Alert Should Be Present    ${msg-alert}

If user is not admin, "edit hero banner" button is absent
    Login as Guest
    Wait Until Page Does Not Contain Element    ${herobanner-1-editBtn}



If user is admin, update previous news
    Login as Admin
    Go to "Edit Previous News" page
    Wait for input value to load    ${select-1st}
    Select From List By Index    ${select-1st}    0
    Select From List By Index    ${select-2nd}    1
    Select From List By Index    ${select-3rd}    2
    Do Update
    Should show modal success

Back button must be working in "Edit Previous News" page
    Login as Admin
    Go to "Edit Previous News" page
    Wait Until Page Contains Element    ${btn-back}    ${wait-seconds}
    Click Button    ${btn-back}
    Should be on homepage

Cancel button must be working in "Edit Previous News" page
    Login as Admin
    Go to "Edit Previous News" page
    Wait Until Page Contains Element    ${btn-cancel}    ${wait-seconds}
    Click Button    ${btn-cancel}
    Should be on homepage

If user is not admin, "edit previous news" button is absent
    Login as Guest
    Wait Until Page Does Not Contain Element    ${prevNews-editBtn}    ${wait-seconds}



*** Keywords ***
Login as Admin
    Click link        ${link-login}
    Input Text        ${input-email}    ${admin-email}
    Input Text        ${input-pass}     ${admin-pass}
    Click Button      ${btn-login}
    Sleep    3 seconds

Login as Guest
    Click link        ${link-login}
    Input Text        ${input-email}    ${guest-email}
    Input Text        ${input-pass}     ${guest-pass}
    Click Button      ${btn-login}
    Sleep    3 seconds

Should be on homepage
    Wait Until Location Is    ${url}    ${wait-seconds}

Go to 1st shown herobanner
    Wait Until Page Contains Element    ${herobanner-1-editBtn}    ${wait-seconds}
    Click Button    ${herobanner-1-editBtn}

Go to "Edit Previous News" page
    Wait Until Page Contains Element    ${prevNews-editBtn}    ${wait-seconds}
    Click Button    ${prevNews-editBtn}

Wait for input value to load
    [Arguments]    ${elem}
    Wait Until Keyword Succeeds    ${wait-seconds}    ${retry-interval-ms}    Input must not be empty    ${elem}

Input must not be empty
    [Arguments]    ${elem}
    ${actual value}=    Get Element Attribute    ${elem}    value
    Should Not Be Empty    ${actual value}

Do Update
    Click Button    ${btn-save}
    Click Button    ${btn-confirm}

Should show modal success
    Wait Until Page Contains Element    ${modal-success}    ${wait-seconds}
    Element Should Be Visible    ${modal-success}

Teardown
    Close Browser

Setup
    Open Browser    ${url}    ${browser}
