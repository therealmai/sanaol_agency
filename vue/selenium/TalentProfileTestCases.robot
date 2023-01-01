*** Settings ***
Library    SeleniumLibrary
Task Setup    Open Browser    ${url}    ${browser}

*** Variables ***
${browser}             Chrome
${url}                 http://localhost:5173/hero
${speed-slow}          0.75 seconds

# Accounts
${admin-email}         dkoepp@example.net
${admin-pass}          password

${talent-email}        garland.rice@example.org
${talent-pass}         password

${guest-email}         fredrick.davis@example.com
${guest-pass}          password


# Links
${link-profile}        xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[2]

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
${btn-profile}         xpath://span[contains(text(),'PROFILE')]
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


*** Test Cases ***
If user is admin, profile button is not visible
    Login as Admin

    Set Selenium Speed    ${speed-slow}

    Page Should Not Contain Element   ${btn-profile}


If user is talent, edit button is visible
    Login as Talent 

    Set Selenium Speed        ${speed-slow}

    Page Should Contain Link         ${link-profile}

    Click Link        ${link-profile}

    Element Should Be Visible        ${btn-edit}

If edit button is clicked, talent edit modal is visible
    Login as Talent 

    Set Selenium Speed        ${speed-slow}

    Page Should Contain Link         ${link-profile}

    Click Link        ${link-profile}

    Click Button      ${btn-edit}

    Element Should Be Visible    ${edit-modal}

If all fields are filled, confirmation modal appear on save
    
    Login as Talent 

    Set Selenium Speed        ${speed-slow}

    Page Should Contain Link         ${link-profile}

    Click Link        ${link-profile}

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

# If delete button is clicked, display delete modal 

#     Login as Talent 

#     Set Selenium Speed        ${speed-slow}

#     Page Should Contain Link         ${link-profile}

#     Click Link        ${link-profile}

#     Click Button      ${btn-edit}

#     Element Should Be Visible        ${edit-modal}

#     Click Element        ${btn-delete}

#     Element Should Be Visible        ${delete-modal}

#     Click Button        ${modal-btn-delete}

#     Element Should Be Visible        ${modal-del-success}

#     Click Element        ${modal-del-success}

#     Element Should Not Be Visible        ${modal-del-success}
    
#     Element Should Not Be Visible        ${delete-modal}
   




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