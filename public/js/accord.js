const acc = document.getElementsByClassName('accordion');
let i;
let len = acc.length;

for (i = 0; i < len ; i++) {
    acc[i].addEventListener('click', function(){
        this.classList.toggle('active');
        let panel = this.nextElementSibling;
        let icon = this.childNodes[1].childNodes[1]
        if(panel.style.maxHeight){
            panel.style.maxHeight = null;
            icon.classList.toggle('ri-subtract-fill')
        }else{
            icon.classList.toggle('ri-subtract-fill')
            panel.style.maxHeight = panel.scrollHeight + 'px'
        }
    })
}