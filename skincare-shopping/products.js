let backToTopBtn = document.querySelector('.back-to-top')

window.onscroll = () => {
    if(document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        backToTopBtn.style.display = 'flex'
    }else{
        backToTopBtn.style.display = 'none'
    }
}

//top nav menu
let menuItems = document.getElementsByClassName('menu-item');
Array.from(menuItems).forEach((item,inedx) => {
    item.onclick =(e) => {
        let currMenu = document.querySelector('.menu-item.active');
        currMenu.classList.remove('active');
        item.classList.add('active');
    }
})

let searchForm = document.querySelector('.search-form')

// document.querySelector('#search-btn').onclick = () =>{
//     searchForm.classList.toggle('active');
//     navbar.classList.remove('active');
//     cartItem.classList.remove('active');    
// }


//cosmetic item
let cosmeticMenuList = document.querySelector('.cosmetic-item-wrap')
let cosmeticCategory = document.querySelector('.cosmetic-category')
let categories = document.querySelectorAll('button')
Array.from(categories).forEach((item,index) => {
    item.onclick = (e) => {
        let currCat = cosmeticCategory.querySelector('button.active')
        currCat.classList.remove('active')
        e.target.classList.add('active')
        cosmeticMenuList.classList ='cosmetic-item-wrap '+ e.target.getAttribute('data-cosmetic-type')

    }
})

// on scorll animation
let scroll = window.requestAnimationFrame || function(callback)
    {window.setTimeout(Callback,1000/60)}
let elToShow = document.querySelectorAll('.play-on-scroll')

isElInViewPort = (el) => {
    let rect = el.getBoundingClientRect()
    return(
        (rect.top <= 0 && rect.bottom >= 0) ||
        (rect.bottom >= (window.innerHeight || 
            document.documentElement.clientHeight) && 
            rect.top <= (window.innerHeight || document.documentElement.clientHeight)) ||
            (rect.top >= 0 && rect.bottom <= (window.innerHeight || 
                document.documentElement.clientHeight))
    )
}
loop = () => { //arrow function
    elToShow.forEach((item,index) =>{
        if (isElInViewPort(item)){
            item.classList.add('start')
        }else{
            item.classList.remove('start')
        }
    })
    scroll(loop)
}
loop()

let body = document.querySelector('body')
const themeCookieName = 'theme'
const themeDark = 'dark'
const themeLight = 'light'

function setCookie(cname, cvalue,exdays) {
    var d = new Date()
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000))
    var expires ="expires"+d.toUTCString()
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/"
}

function getCookie(cname) {
    var name = cname + "="
    var ca = document.cookie.split(';')
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' '){
            c = c.substring(1)
        }
        if (c.indexOf(name) == 0){
            return c.substring(name.length, c.length)
        }
    }
    return ""
}
loadTheme()

function loadTheme() {
    var theme = getCookie(themeCookieName)
    body.classList.add(theme === "" ? themeLight : theme) 
}

function switchTheme() {
    if(body.classList.contains(themeLight)){
        body.classList.remove(themeLight)
        body.classList.add(themeDark)
        setCookie(themeCookieName, themeDark)
    }else{
        body.classList.remove(themeDark)
        body.classList.add(themeLight)
        setCookie(themeCookieName, themeLight)
    }
}