*** Settings ***
Library    SeleniumLibrary
Task Setup    Open Browser    ${url}    ${browser}
Task Teardown    Teardown

*** Variables ***
${browser}             Chrome
${url}                 http://localhost:5173/hero
${speed-slow}          1 seconds

# Accounts
${admin-email}         a@aa.com
${admin-pass}          password

${talent-email}        t@aa.com
${talent-pass}         password

${guest-email}         g@aa.com
${guest-pass}          password


# Links
${link-reminders}      xpath://span[contains(text(),'REMINDERS')]
${link-login}          xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]
${reminder-card}       xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]
${event-title}         xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[2]/a[1]
${event-date}          xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[2]/p[1]/span[1]
${event-location}      xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[2]/p[1]/span[2]
${event-desc}          xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]/div[1]/div[2]/p[2]

# Input Fields
${input-email}         xpath://input[@id='email']
${input-pass}          xpath://input[@id='password']
${btn-login}           xpath://button[contains(text(),'Log in')]

${temp1}
${temp2}
*** Test Cases ***
If user is admin, reminders button is not visible
    Login as Admin
    Set Selenium Speed    ${speed-slow}
    Element Should Not Be Visible   ${link-reminders}


If user is guest, reminders button is not visible
    Login as Guest
    Set Selenium Speed    ${speed-slow}
    Element Should Not Be Visible   ${link-reminders}


If user is talent, reminders button is visible
    Login as Talent
    Set Selenium Speed        ${speed-slow}
    Sleep    2 seconds
    Element Should Be Visible         ${link-reminders}

Check presence of reminder cards
    Login as Talent
    Set Selenium Speed        ${speed-slow}
    Sleep    2 seconds
    Click Element        ${link-reminders}
    Sleep    5 seconds

    #check components
    Element Should Be Visible        ${reminder-card}
    Content must not be empty        ${event-title}
    Content must not be empty        ${event-date}
    Content must not be empty        ${event-location}
    Content must not be empty        ${event-desc}

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

Content must not be empty
    [Arguments]    ${elem}
    ${temp1}=    Get Element Attribute    ${elem}    text
    ${temp2}=    Convert To String    ${temp1}
    Should Not Be Empty    ${temp2}

Teardown
    Set Selenium Speed    0.1 seconds
    Close Browser
