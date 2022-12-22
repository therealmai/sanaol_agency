*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/Membership
${speed-slow}          0.65 seconds*** Test Cases ***

${fname}    xpath://input[@id='fname']
${lname}    xpath://input[@id='lname']
${insta_handle}    xpath://input[@id='insta_handle']
${email}    xpath://input[@id='email']
${password}    xpath://input[@id='password']
${confirm_password}    xpath://input[@id='confirm_password']    
${reason}    xpath://textarea[@id='reason']



*** Test Cases ***
Check If All Fields Are Clickable
    Open Browser        ${url}    ${browser}
    Check If All Fields Are Inputable
    Check If All Password Fields Are Of Type Password

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



# Must not see EDIT SECTION button if user type is general
