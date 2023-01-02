*** Settings ***
Library    SeleniumLibrary
Task Setup    Open Browser    ${url}    ${browser}
Test Teardown    Teardown

*** Variables ***
${browser}                 Chrome
${url}                     http://localhost:5173
${speed-fast}              0.9 seconds
${speed-slow}              1.1 seconds
${wait-seconds}            4 seconds
${retry-interval-ms}       500 ms

${link-events}             xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[4]
${link-events-admin}       xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[6]
${link-events-talent}      xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[6]
${link-events-general}     xpath://html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/span[1]/a[6]
${link-login}              xpath://body/div[@id='app']/div[1]/div[1]/nav[1]/div[1]/span[1]/a[5]

${input-email}             xpath://input[@id='email']
${input-pass}              xpath://input[@id='password']

${btn-login}               xpath://button[contains(text(),'Log in')]

${admin-email}             a@aa.com        #change the email based on db
${admin-pass}              password

${talent-email}             t@aa.com        #change the email based on db
${talent-pass}              password

${guest-email}             g@aa.com            #change the email based on db
${guest-pass}              password

${events-carousel}         xpath://div[@id='carouselDarkVariant1']
${news-articles}           xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[3]

${articles-add-link}       xpath://button[contains(text(),'Add Articles')]
${article-edit-link}       xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[3]/div[1]/div[1]/div[1]/div[1]/a[1]/button[1]
${article-link}            xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[3]/div[1]/div[1]/div[1]/span[1]
${article-delete-link}     xpath://button[contains(text(),'DELETE')]

${article-image}           xpath://body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[3]/img[1]
${article-title}           xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[3]/div[1]
${article-date}            xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[3]/div[2]
${article-content}         xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[3]/p[1]
${article-page-edit-link}  xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[2]/a[1]
${article-page-del-link}   xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[2]/button[1]

${save-btn}                xpath://button[contains(text(),'Save')]
${save-btn-2}              xpath://button[contains(text(),'SAVE')]
${confirm-btn}             xpath://button[@id='updateButton']
${confirm-btn-2}           xpath://button[contains(text(),'CONFIRM')]

${input-news-title}       xpath://body/div[1]/div[1]/form[1]/div[1]/label[1]/input[1]
${input-news-content}     xpath://body/div[1]/div[1]/form[1]/div[1]/textarea[1]

${update-news-title}      xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[1]/input[1]
${update-news-content}    xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/form[1]/div[2]/textarea[1]

${success-modal}           xpath://div[@id='myupdatemodal']
${success-modal-2}         xpath://html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[1]
${msg-alert}               All fields must be filled.

${first-news-title}

*** Test Cases ***
Check News page for all users
    Set Selenium Speed     ${speed-slow}
    Wait Until Page Contains Element     ${link-events}
    Click Link    ${link-events}
    Wait Until Element Is Visible    ${events-carousel}
    Wait Until Element Is Visible    ${news-articles}


Check Accessibility to a News Article
    Set Selenium Speed     ${speed-slow}
    Wait Until Page Contains Element     ${link-events}
    Click Link    ${link-events}
    Wait until Element Is Visible    ${events-carousel}
    Wait Until Element Is Visible    ${news-articles}
    Double Click Element    ${article-link}
    Element Should Be Visible     ${article-image}
    Element Should Be Visible     ${article-title}
    Element Should Be Visible     ${article-date}
    Element Should Be Visible     ${article-content}


If user is admin, edit button should be visible in main news page
    Login as Admin
    Set Selenium Speed    ${speed-fast}
    Wait Until Keyword Succeeds    1 min    ${speed-slow}     Go to Events as Admin
    Wait Until Page Contains Element     ${link-events}
    Element Should Be Visible    ${article-edit-link}
    Element Should Be Visible    ${articles-add-link}


If user is guest, edit button should not be visible in main news page
    Login as Guest
    Set Selenium Speed    ${speed-fast}
    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Guest
    Wait Until Element Is Visible    ${news-articles}
    Element Should Not Be Visible    ${article-edit-link}
    Element Should Not Be Visible    ${articles-add-link}


If user is admin, edit button should be visible in individual article page
    Login as Admin
    Set Selenium Speed    ${speed-fast}
    Wait Until Keyword Succeeds    1 min    ${speed-slow}     Go to Events as Admin
    Wait Until Page Contains Element     ${article-link}
    Double Click Element     ${article-link}
    Wait Until Page Contains Element    ${article-title}
    Element Should Be Visible    ${article-page-edit-link}
    Element Should Be Visible    ${article-page-del-link}


If user is talent/guest, edit button should not be visible in individual article page
    Login as Guest
    Set Selenium Speed    ${speed-fast}
    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Guest
    Wait Until Page Contains Element     ${article-link}
    Double Click Element    ${article-link}
    Wait Until Page Contains Element    ${article-title}
    Element Should Not Be Visible    ${article-page-edit-link}
    Element Should Not Be Visible    ${article-page-del-link}


If there are fields missing in add article page
    Login as Admin
    Set Selenium Speed    ${speed-fast}
    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Admin
    Wait Until Page Contains Element    ${articles-add-link}
    Click Button    ${articles-add-link}
    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Do Save
    Alert Should Be Present    ${msg-alert}


If all fields are present in add article page
    Login as Admin
    Set Selenium Speed    ${speed-fast}
    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Admin
    Wait Until Page Contains Element    ${articles-add-link}
    Click Button    ${articles-add-link}
    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Input News fields
    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Do Save
    Element Should Be Visible    ${success-modal}


If a field is missing in edit article page
    Login as Admin
    Set Selenium Speed    ${speed-fast}
    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Admin
    Wait Until Page Contains Element     ${article-link}
    Click Button    ${article-edit-link}
    Wait for input value to load    ${update-news-title}
    Press Keys  ${update-news-title}   CTRL+a   BACKSPACE
    Click Button      ${save-btn-2}
    Click Button      ${confirm-btn-2}
    Alert Should Be Present    ${msg-alert}


If a field is changed in edit article page
    Login as Admin
    Set Selenium Speed    ${speed-fast}
    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Admin
    Wait Until Page Contains Element     ${article-link}
    Click Button    ${article-edit-link}
    Wait for input value to load    ${update-news-title}
    Input Text    ${update-news-title}     Updated Title
    Click Button      ${save-btn-2}
    Click Button      ${confirm-btn-2}
    Element Should Be Visible    ${success-modal-2}


Deleting a news article - news article should no longer be seen
    Login as Admin
    Set Selenium Speed    ${speed-fast}
    Wait Until Keyword Succeeds    30 seconds    ${speed-slow}     Go to Events as Admin
    ${first-news-title}=    Get Text     ${article-link}
    Double Click Element   ${article-link}
    Wait Until Page Contains Element    ${article-page-del-link}
    Click Button    ${article-page-del-link}
    Wait Until Page Contains Element    ${article-link}
    ${updated-news-title}=    Get Text     ${article-link}
    Should Not Be Equal As Strings    ${first-news-title}    ${updated-news-title}

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
    Wait Until Page Contains Element    ${link-events-admin}
    Click link        ${link-events-admin}
    Wait Until Page Contains Element    ${news-articles}

Go to Events as Talent
    Wait Until Page Contains Element    ${link-events-talent}
    Click link        ${link-events-talent}
    Wait Until Page Contains Element    ${news-articles}

Go to Events as Guest
    Wait Until Page Contains Element    ${link-events-general}
    Click link        ${link-events-general}
    Wait Until Page Contains Element    ${news-articles}

Input News fields
    Input Text        ${input-news-title}       Testing Title
    Input Text        ${input-news-content}     Testing Content

Wait for input value to load
    [Arguments]    ${elem}
    Wait Until Keyword Succeeds    ${wait-seconds}    ${retry-interval-ms}    Input must not be empty    ${elem}

Input must not be empty
    [Arguments]    ${elem}
    ${actual value}=    Get Element Attribute    ${elem}    value
    Should Not Be Empty    ${actual value}

Do Save
    Click Button      ${save-btn}
    Click Button      ${confirm-btn}

Teardown
    Set Selenium Speed    ${speed-fast}
    Close Browser
