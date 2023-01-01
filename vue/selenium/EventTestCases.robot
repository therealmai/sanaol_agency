*** Settings ***
Library    SeleniumLibrary
Task Setup    Open Browser    ${url}    ${browser}
Test Teardown    Teardown

*** Variables ***
${browser}                 Chrome
${url}                     http://127.0.0.1:5173
${speed-fast}              0.1 seconds
${speed-slow}              0.5 seconds

${link-events}             xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[4]
${link-events-admin}       xpath://body/div[@id="app"]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[6]
${link-events-general}     xpath://body/div[@id="app"]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[6]
${link-login}              xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]

${input-email}             xpath://input[@id='email']
${input-pass}              xpath://input[@id='password']  

${btn-login}               xpath://button[contains(text(),'Log in')]

${admin-email}             berniece57@example.com        #change the email based on db
${admin-pass}              password

${guest-email}             lyda02@example.net            #change the email based on db
${guest-pass}              password

${events-carousel}         xpath://div[@id='carouselControls']
${news-articles}           xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[3]

${events-edit-link}        xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/a[1]
${articles-add-link}       xpath://button[contains(text(),'Add Articles')]

${events-add-new-link}     xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[2]/a[1]

${save-btn}                xpath://button[contains(text(),'Save')]
${confirm-btn}             xpath://button[@id='updateButton']

${input-event-title}       xpath://body/div[1]/div[1]/form[1]/div[1]/label[1]/input[1]
${input-event-date}        xpath://body/div[1]/div[1]/form[1]/div[1]/label[2]/input[1]
${input-event-location}    xpath://body/div[1]/div[1]/form[1]/div[1]/label[3]/input[1]
${input-event-type}        xpath://body/div[1]/div[1]/form[1]/div[1]/label[4]/input[1]
${input-event-content}     xpath://body/div[1]/div[1]/form[1]/div[1]/textarea[1]

${success-modal}           xpath://div[@id='myupdatemodal']

${table-row-element}       xpath://tbody/tr[1]
${table-row-edit-link}     xpath://tbody/tr[1]/td[4]/a[1]
${table-row-delete-btn}    xpath://tbody/tr[1]/td[4]/button[1]

${msg-alert}               All fields must be filled. 

*** Test Cases ***
Check Event page for all users
    Set Selenium Speed     ${speed-fast}

    Click Link    ${link-events}
    
    Element Should Be Visible    ${events-carousel}

    Element Should Be Visible    ${news-articles}


If user is admin, edit button should be visible
    Login as Admin

    Set Selenium Speed    ${speed-fast}

    Wait Until Keyword Succeeds    1 min    ${speed-slow}     Go to Events as Admin   

    Element Should Be Visible    ${events-edit-link}

    Element Should Be Visible    ${articles-add-link}


If user is not admin, edit button should not be visible
    Login as Guest

    Set Selenium Speed    ${speed-fast}

    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Guest 

    Element Should Not Be Visible    ${events-edit-link}

    Element Should Not Be Visible    ${articles-add-link}


If all fields are missing in add events
    Login as Admin

    Set Selenium Speed    ${speed-fast}

    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Admin 

    Click Link    ${events-edit-link}

    Click Link    ${events-add-new-link}

    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Do Save

    Alert Should Be Present    ${msg-alert}


If all fields are present in add events
    Login as Admin

    Set Selenium Speed    ${speed-fast}

    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Admin

    Click Link    ${events-edit-link}

    Click Link    ${events-add-new-link}

    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Input Event fields

    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Do Save

    Element Should Be Visible    ${success-modal}


If a field is missing in edit events
    Login as Admin

    Set Selenium Speed    ${speed-fast}

    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Admin

    Click Link    ${events-edit-link}

    Wait Until Page Contains Element    ${table-row-element}

    Click Link    ${table-row-edit-link}

    Press Keys  ${input-event-title}   CTRL+a   BACKSPACE   

    Do Save

    #Alert Should Be Present    ${msg-alert}


If a field is changed in edit events
    Login as Admin

    Set Selenium Speed    ${speed-fast}

    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Admin

    Click Link    ${events-edit-link}

    Wait Until Page Contains Element    ${table-row-element}

    Click Link    ${table-row-edit-link}

    Input Text    ${input-event-title}     Updated Title

    Do Save

    Element Should Be Visible    ${success-modal}


If a row is deleted in events
    Login as Admin

    Set Selenium Speed    ${speed-fast}

    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Admin

    Click Link    ${events-edit-link}

    Wait Until Page Contains Element    ${table-row-element}

    Click Button    ${table-row-delete-btn}

    #Alert Should Be Present 


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

Go to Events as Admin
    Click link        ${link-events-admin}

Go to Events as Guest
    Click link        ${link-events-general}

Input Event fields
    Input Text        ${input-event-title}       Testing Title
    Input Text        ${input-event-date}        1970/01/01
    Input Text        ${input-event-location}    Testing Location
    Input Text        ${input-event-type}        Testing Type
    Input Text        ${input-event-content}     Testing Content

Do Save
    Click Button      ${save-btn}
    Click Button      ${confirm-btn}

Teardown
    Set Selenium Speed    ${speed-fast}
    Close Browser