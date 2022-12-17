*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${browser}    Chrome
${url}    https://stackoverflow.com/questions/9705982/pythonw-exe-or-python-exe

*** Test Cases ***
Test Case 1
    Open Browser    ${url}    ${browser}
    Maximize Browser Window
    Click Link    xpath://a[contains(text(),'Ask Question')]
    Close Browser
    # Open_browser
    

*** Keywords ***
# open_Browser
    # Open Browser    ${url}    ${browser}