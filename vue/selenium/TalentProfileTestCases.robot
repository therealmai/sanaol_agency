*** Settings ***
Library    SeleniumLibrary
Task Setup    Open Browser    ${url}    ${browser}

*** Variables ***
${browser}             Chrome
${url}                 http://localhost:5173/hero
${speed-slow}          0.75 seconds


# Links
${link-profile}        xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[2]

${link-login}          xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]

# Input Fields
${input-email}         xpath://input[@id='email']
${input-pass}          xpath://input[@id='password']

# Buttons
${btn-login}           xpath://button[contains(text(),'Log in')]
${btn-profile}         xpath://span[contains(text(),'PROFILE')]
${btn-edit}            xpath://button[contains(text(),'Edit Profile')]

${edit-modal}          xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]

# Accounts
${admin-email}         whilpert@example.org
${admin-pass}          password

${talent-email}        olson.monserrat@example.org
${talent-pass}         password


*** Test Cases ***
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

If user is admin, profile button is not visible
    Login as Admin

    Set Selenium Speed    ${speed-slow}

    # Element Should Not Be Visible    ${link-profile}



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


Teardown
    Set Selenium Speed    0.1 seconds
    Close Browser