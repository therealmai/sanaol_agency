*** Settings ***
Library    SeleniumLibrary
Task Setup    Open Browser    ${url}    ${browser}
Task Teardown    Teardown

*** Variables ***
${browser}             Chrome
${url}                 http://localhost:5173/
${url_membership}      http://localhost:5173/Membership
${url_login}           http://localhost:5173/login
${speed-slow}          0.1 seconds
${speed-slower}        0.9 seconds

${nav-reg}         xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[1]
${nav_login}       xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]/span[1]
${nav_user}        xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/span[1]

${x}

# Registration
${fname}           xpath://input[@id='fname']
${lname}           xpath://input[@id='lname']
${insta_handle}    xpath://input[@id='insta_handle']
${email}           xpath://input[@id='email']
${password}        xpath://input[@id='password']
${confirm_password}    xpath://input[@id='confirm_password']
${reason}          xpath://textarea[@id='reason']
${apply}           xpath://button[contains(text(),'APPLY AS A MEMBER')]
${confirm}         xpath://button[contains(text(),'Confirm')]

# Login with test account
${login_email_field}     xpath://input[@id='email']
${login_password_field}  xpath://input[@id='password']
${login_submit_button}   xpath://button[contains(text(),'Log in')]

# Test accout credentials (for first 2 test cases)
${test_email}       test@test.com
${test_password}    testtest
${test_fname}       test

${temp}

# Created Accounts for User Type Verification
${admin-email}         a@aa.com
${admin-pass}          password
${talent-email}        t@aa.com
${talent-pass}         password
${guest-email}         g@aa.com
${guest-pass}          password
${link-login}          xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]

# Error trapping
${error-title-reg}      xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[1]/div[1]/div[1]/h2[1]
${error-title-login}    xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[4]/div[1]/div[1]/div[1]/div[1]/div[1]/h2[1]
${error-message-reg}    xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[1]/div[2]/h3[1]
${error-message-login}  xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[4]/div[1]/div[1]/div[1]/div[2]/h3[1]

${edit-hero-btn}    xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[2]/div[1]/div[1]/a[1]/button[1]

# Logout button
${logout-btn}    xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/img[1]

*** Test Cases ***
Check Membership Registration Functionalities
    Set Selenium Speed    ${speed-slow}
    Click Element   ${nav-reg}
    Check If All Fields Are Inputable
    Check If All Password Fields Are Of Type Password

    Click Button    ${apply}
    Sleep    2 seconds
    Click Button    ${confirm}

    ${current_link}    Get Location
    LOG   Current link is: ${current_link}    console=yes
    LOG   Actual link should be: ${url_login}        console=yes

    #CHECK REDIRECTION AFTER REGISTRATION
    ${current_link}    Convert To String    ${current_link}
    ${temp}    Convert To String    ${url_login}
    Should Be Equal As Strings    ${current_link}    ${temp}

Check Login Status Using Newly Registered Account
    Set Selenium Speed    ${speed-slow}
    Test Login
    Sleep    5 seconds

Registration error: Incomplete fields
    Set Selenium Speed    ${speed-slow}
    Click Element   ${nav-reg}
    Input Text       ${fname}               test2             clear=true
    Input Text       ${email}               test@test.com    clear=true
    Input Password   ${password}            testtest2
    Input Password   ${confirm_password}    testtest2
    Input Text       ${reason}              test@test.com    clear=true
    Click Button    ${apply}
    Element Text Should Be    ${error-title-reg}      Registration Failed
    Element Text Should Be    ${error-message-reg}    Fields are empty. Please enter your credentials.


Registration error: Non matching passwords
    Set Selenium Speed    ${speed-slow}
    Click Element   ${nav-reg}
    Input Text       ${fname}               test3             clear=true
    Input Text       ${lname}               test3             clear=true
    Input Text       ${insta_handle}        test3             clear=true
    Input Text       ${email}               test@test.com    clear=true
    Input Password   ${password}            test1234
    Input Password   ${confirm_password}    test5678
    Input Text       ${reason}              test@test.com    clear=true
    Click Button    ${apply}
    Element Text Should Be    ${error-title-reg}      Registration Failed
    Element Text Should Be    ${error-message-reg}    Password does not match. Please try again.


Login error: Incomplete credentials
    Set Selenium Speed    ${speed-slow}
    Click Element       ${nav_login}
    Input Text        ${login_email_field}        ${test_email}
    Click Button      ${login_submit_button}
    Sleep    1 seconds
    Element Text Should Be    ${error-title-login}      Login Failed
    Element Text Should Be    ${error-message-login}    Empty Fields. Please Enter your credentials.


Login error: Incorrect credentials
    Set Selenium Speed    ${speed-slow}
    Click Element       ${nav_login}
    Input Text        ${login_email_field}        test@test.com
    Input Password    ${login_password_field}     test1234
    Click Button      ${login_submit_button}
    Sleep    5 seconds
    Element Text Should Be    ${error-title-login}      Login Failed
    Element Text Should Be    ${error-message-login}    Wrong Email or Password. Please try again.


User type verification: Admin
    Set Selenium Speed    ${speed-slow}
    Login as Admin
    Sleep    4 seconds
    Element Should Be Visible    //span[contains(text(),'USERS')]
    Element Should Not Be Visible    //span[contains(text(),'PROFILE')]
    Element Should Be Visible    //span[contains(text(),'TALENTS')]
    Element Should Not Be Visible    //span[contains(text(),'REMINDERS')]
    Element Should Be Visible    //span[contains(text(),'SERVICES')]
    Element Should Be Visible    //span[contains(text(),'NEWS & EVENTS')]
    Element Should Be Visible    ${edit-hero-btn}


User type verification: Talent
    Set Selenium Speed    ${speed-slow}
    Login as Talent
    Sleep    4 seconds
    Element Should Not Be Visible    //span[contains(text(),'USERS')]
    Element Should Be Visible    //span[contains(text(),'PROFILE')]
    Element Should Be Visible    //span[contains(text(),'TALENTS')]
    Element Should Be Visible    //span[contains(text(),'REMINDERS')]
    Element Should Be Visible    //span[contains(text(),'SERVICES')]
    Element Should Be Visible    //span[contains(text(),'NEWS & EVENTS')]
    Element Should Not Be Visible    ${edit-hero-btn}


User type verification: Guest
    Set Selenium Speed    ${speed-slow}
    Login as Guest
    Sleep    4 seconds
    Element Should Not Be Visible    //span[contains(text(),'USERS')]
    Element Should Not Be Visible    //span[contains(text(),'PROFILE')]
    Element Should Be Visible    //span[contains(text(),'TALENTS')]
    Element Should Not Be Visible    //span[contains(text(),'REMINDERS')]
    Element Should Be Visible    //span[contains(text(),'SERVICES')]
    Element Should Be Visible    //span[contains(text(),'NEWS & EVENTS')]
    Element Should Not Be Visible    ${edit-hero-btn}

Logout verification
    Set Selenium Speed    ${speed-slow}
    Test Login
    Sleep    2 seconds
    Click Element    ${logout-btn}
    Sleep    5 seconds

    ${current_link}    Get Location
    LOG   Current link is: ${current_link}    console=yes
    LOG   Actual link should be: ${url_login}        console=yes

    #CHECK REDIRECTION AFTER LOGOUT
    ${current_link}    Convert To String    ${current_link}
    ${temp}    Convert To String    ${url_login}
    Should Be Equal As Strings    ${current_link}    ${temp}




*** Keywords ***
Check If All Fields Are Inputable
    Element Text Should Be    //h1[contains(text(),'Become a Rising Star')]     Become a Rising Star
    Input Text       ${fname}               test             clear=true
    Input Text       ${lname}               test             clear=true
    Input Text       ${insta_handle}        test             clear=true
    Input Text       ${email}               test@test.com    clear=true
    Input Password   ${password}            testtest
    Input Password   ${confirm_password}    testtest
    Input Text       ${reason}              test@test.com    clear=true

Check If All Password Fields Are Of Type Password
    Element Attribute Value Should Be    ${password}    type    password
    Element Attribute Value Should Be    ${confirm_password}    type    password

Test Login
    Click Element     ${nav_login}
    Input Text        ${login_email_field}        ${test_email}            clear=true
    Input Password    ${login_password_field}     ${test_password}         clear=true
    Click Button      ${login_submit_button}
    Sleep    1 seconds
    Wait Until Page Contains Element    ${nav_user}
    ${x}    Get Text    ${nav_user}
    Should Be Equal As Strings    ${x}    ${test_fname}

Login as Admin
    Click link        ${link-login}
    Input Text        ${login_email_field}    ${admin-email}
    Input Text        ${login_password_field}     ${admin-pass}
    Click Button      ${login_submit_button}

Login as Talent
    Click link        ${link-login}
    Input Text        ${login_email_field}    ${talent-email}
    Input Text        ${login_password_field}     ${talent-pass}
    Click Button      ${login_submit_button}

Login as Guest
    Click link        ${link-login}
    Input Text        ${login_email_field}    ${guest-email}
    Input Text        ${login_password_field}     ${guest-pass}
    Click Button      ${login_submit_button}

Teardown
    Set Selenium Speed    0.1 seconds
    Close Browser
# Must not see EDIT SECTION button if user type is general
