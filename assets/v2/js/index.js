const menus = [
    {
        title: 'Rings', children: [
            {
                title: 'Shop By Style',
                data: [
                    { title: 'Engagement', image: '', path: '' },
                    { title: 'Wedding', image: '', path: '' },
                    { title: 'Gift', image: '', path: '' },
                ]
            }
        ]
    },
    {
        title: 'Gold', children: [
            { title: 'Engagement', image: '', path: '' },
            { title: 'Wedding', image: '', path: '' },
            { title: 'Gift', image: '', path: '' },
        ]
    },
    {
        title: 'Silver', children: [
            { title: 'Engagement', image: '', path: '' },
            { title: 'Wedding', image: '', path: '' },
            { title: 'Gift', image: '', path: '' },
        ]
    },
]

function menuOverLayHandler(type) {
    switch (type) {
        case 'rings':
            break;
    }
}

function openModal(modalId) {
    document.getElementById(modalId).classList.add('is-active')
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('is-active')
}

function openDrawer(drawerId) {
    console.log(drawerId, "clicked")
    document.getElementById('menu-toggle').style.display = 'none'
    document.getElementById('drawer-close-toggle').innerHTML = `<image class="menu-item icons" onclick="closeDrawer('${drawerId}')" src="close.png" alt="menu icon" />`;
    document.getElementById(drawerId).classList.add('open')
}

function closeDrawer(drawerId) {
    document.getElementById('drawer-close-toggle').innerHTML = ``;
    document.getElementById(drawerId).classList.remove('open')
    document.getElementById('menu-toggle').style.display = 'block'
}