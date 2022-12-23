*** Settings ***
Library    SeleniumLibrary

*** Variables ***
${browser}             Chrome
${url}                 http://127.0.0.1:5173/hero
${carousel}            //body/div[@id='app']/div[1]/div[1]/div[1]/div[1]/div[1]/div[1]/div[2]/div[3]
${usermgt}             http://127.0.0.1:5173/usermanagement
${login}               http://127.0.0.1:5173/login
${events}              http://127.0.0.1:5173/events


*** Test Cases ***
Title of Hero Banner Page
    Open Browser        ${url}    ${browser}
Check Carousel Slider
    Open Browser        ${url}    ${browser}
    Wait Until Element Is Visible    //div[@id='carouselDarkVariant']

# Check URL Access Test
#     Open Browser       ${url}    ${browser}
#     ${current_url}=    Get Location
#     Should Be Equal    ${current_url}    ${url}   
#     Go To    ${usermgt}  
#     ${current_url}=    Get Location
#     Should Be Equal    ${current_url}    ${login}  

Check Link Href Test
    Open Browser    ${url}    ${browser}
    ${link_href}=    Get Element Attribute    //span[contains(text(),'Jastine Guzman emerges as Ms. International Queen ')]
    Should Be Equal    ${link_href}   ${events}  

Check Nav Href Test
    Open Browser    ${url}    ${browser}
    ${link_href}=    Get Element Attribute    /html[1]/body[1]/div[1]/div[1]/div[1]/nav[1]/div[1]/p[1]
    Should Be Equal    ${link_href}   ${url}  


*** Keywords ***
# open_Browser
    # Open Browser    ${url}    ${browser}