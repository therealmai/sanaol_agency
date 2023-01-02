*** Settings ***
Library    SeleniumLibrary
Task Setup    Open Browser    ${url}    ${browser}
Task Teardown    Teardown

*** Variables ***
${browser}             Chrome
${url}                 http://localhost:5173/hero
${speed-slow}          1.3 seconds

# Accounts
${admin-email}         a@aa.com
${admin-pass}          password

${talent-email}        t@aa.com
${talent-pass}         password

${guest-email}         g@aa.com
${guest-pass}          password


# Links
${link-profile}        xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[2]


${link-login}          xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]

# Input Fields
${input-email}         xpath://input[@id='email']
${input-pass}          xpath://input[@id='password']

${input-modal-fname}   xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[1]/form[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/input[1]
${input-modal-lname}   xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[1]/form[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/input[1]
${input-modal-email}   xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[1]/form[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/input[1]
${input-modal-ig}      xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[1]/form[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[2]/input[1]
${input-modal-bio}     xpath://textarea[@id='txtarea']

# Buttons
${btn-login}           xpath://button[contains(text(),'Log in')]
${btn-profile}         xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[2]/span[1]
${btn-edit}            xpath://button[contains(text(),'Edit Profile')]
${btn-delete}          xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[1]/form[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[1]/span[1]/*[1]
${modal-btn-save}      xpath://button[contains(text(),'Save')]
${modal-btn-confirm}   xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[2]/div[2]/div[1]/div[1]/div[2]/button[1]
${modal-btn-delete}    xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[4]/div[1]/div[1]/div[2]/button[1]
${modal-del-success}        xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[5]/div[1]

${edit-modal}          xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]
${confirm-modal}       xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[2]/div[2]/div[1]/div[1]
${success-modal}       xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[3]/div[1]
${delete-modal}        xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[4]/div[1]/div[1]

#alert message
${msg-alert}           All fields must be filled.

*** Test Cases ***
If user is admin, profile button is not visible
    Login as Admin

    Set Selenium Speed    ${speed-slow}

    Sleep    2 seconds

    Element Should Not Be Visible   ${btn-profile}


If user is talent, edit button is visible
    Login as Talent

    Set Selenium Speed        ${speed-slow}

    Sleep    2 seconds

    Element Should Be Visible         ${btn-profile}

    Click Element        ${btn-profile}

    Element Should Be Visible        ${btn-edit}

If edit button is clicked, talent edit modal is visible
    Login as Talent

    Set Selenium Speed        ${speed-slow}

    Sleep    2 seconds

    Element Should Be Visible         ${btn-profile}

    Click Element        ${btn-profile}

    Click Button      ${btn-edit}

    Element Should Be Visible    ${edit-modal}

If all fields are filled, confirmation modal appear on save

    Login as Talent

    Set Selenium Speed        ${speed-slow}

    Sleep    2 seconds

    Element Should Be Visible         ${btn-profile}

    Click Element        ${btn-profile}

    Click Button      ${btn-edit}

    Element Should Be Visible    ${edit-modal}

    Input Text        ${input-modal-fname}    test-fname

    Input Text        ${input-modal-lname}    test-lname

    Input Text        ${input-modal-email}    test-email

    Input Text        ${input-modal-ig}    test-ig

    Input Text        ${input-modal-bio}    test-bio

    Click Button      ${modal-btn-save}

    Element Should Be Visible     ${confirm-modal}

    Click Button     ${modal-btn-confirm}

    Element Should Be Visible     ${success-modal}

If there are missing fields, update should not run

    Login as Talent

    Set Selenium Speed        ${speed-slow}

    Sleep    2 seconds

    Element Should Be Visible         ${btn-profile}

    Click Element        ${btn-profile}

    Click Button      ${btn-edit}

    Element Should Be Visible        ${edit-modal}

    Press Keys  ${input-modal-fname}   CTRL+a   BACKSPACE

    Click Button      ${modal-btn-save}

    Element Should Be Visible     ${confirm-modal}

    Click Button     ${modal-btn-confirm}

    Alert Should Be Present    ${msg-alert}

If delete image button is clicked, display delete modal

    Login as Talent

    Set Selenium Speed        ${speed-slow}

    Sleep    2 seconds

    Element Should Be Visible         ${btn-profile}

    Click Element        ${btn-profile}

    Click Button      ${btn-edit}

    Element Should Be Visible        ${edit-modal}

    Set Selenium Speed        2 seconds

    Click Element        ${btn-delete}

    Set Selenium Speed    ${speed-slow}

    Element Should Be Visible        ${delete-modal}

    Click Button        ${modal-btn-delete}

    Element Should Be Visible        ${modal-del-success}

    Click Element        ${modal-del-success}

    Element Should Not Be Visible        ${modal-del-success}

    Element Should Not Be Visible        ${delete-modal}

*** Keywords ***
Login as Admin
    Click link        ${link-login}
    Input Text        ${input-email}    ${admin-email}
    Input Text        ${input-pass}     ${admin-pass}
    Click Button      ${btn-login}

Login as Talent
    Click link        ${link-login}
    Input Text        ${input-email}    ${talent-email}
    Input Text        ${input-pass}     ${talent-pass}
    Click Button      ${btn-login}

Login as Guest
    Click link        ${link-login}
    Input Text        ${input-email}    ${guest-email}
    Input Text        ${input-pass}     ${guest-pass}
    Click Button      ${btn-login}

Teardown
    Set Selenium Speed    0.1 seconds
    Close Browser
