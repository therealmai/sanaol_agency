*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/hero


*** Test Cases ***
Title of Service Edit Page
    Open Browser        ${url}    ${browser}
    

*** Keywords ***
# open_Browser
    # Open Browser    ${url}    ${browser}