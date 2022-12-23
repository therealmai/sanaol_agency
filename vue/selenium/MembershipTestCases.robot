*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${browser}             Chrome
${url_base}                 http://127.0.0.1:5173/
${url_membership}                 http://127.0.0.1:5173/Membership
${url_login}                 http://127.0.0.1:5173/login
${speed-slow}          0.25 seconds

${nav_login}    xpath:/html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]/span[1]
${nav_user}    xpath:/html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/span[1]

${x}

${fname}    xpath://input[@id='fname']
${lname}    xpath://input[@id='lname']
${insta_handle}    xpath://input[@id='insta_handle']
${email}    xpath://input[@id='email']
${password}    xpath://input[@id='password']
${confirm_password}    xpath://input[@id='confirm_password']    
${reason}    xpath://textarea[@id='reason']
${apply}    xpath://button[contains(text(),'APPLY AS A MEMBER')]

${login_email_field}    xpath://input[@id='email']
${login_password_field}    xpath://input[@id='password']
${login_submit_button}    xpath://button[contains(text(),'Log in')]

${test_email}    test@test.com
${test_password}    testtest
${test_fname}    test

*** Test Cases ***
Check Membership Functionalities
    Open Browser        ${url_membership}    ${browser}
    Set Selenium Speed    ${speed-slow}
    Check If All Fields Are Inputable
    Check If All Password Fields Are Of Type Password
    Click Button    ${apply}
    ${current_link}    Get Location
    IF  ${current_link} != ${url_login}
        FAIL
    END
    

Check If Logins Works
    Open Browser        ${url_base}    ${browser}
    Set Selenium Speed    ${speed-slow}
    Test Login
    Sleep    5 seconds
    

# Must not see EDIT SECTION button if user type is general
    

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
    Click Element    ${nav_login}
    Input Text        ${login_email_field}        ${test_email}            clear=true
    Input Password    ${login_password_field}     ${test_password}         clear=true
    Click Button      ${login_submit_button}

    ${x}    Get Text    ${nav_user}
    Should Be Equal As Strings    ${x}    ${test_fname}

Create An Account    

# Must not see EDIT SECTION button if user type is general
