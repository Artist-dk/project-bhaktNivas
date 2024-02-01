
var a = document.querySelector('.fa-box');
var b = document.querySelector('.wel-rb');
var c = document.querySelector('.icon-a');
var d = document.querySelector('.fb-box');
var e = document.querySelector('.wel-cs');
var f = document.querySelector('.icon-b');
var p = document.querySelector('.page');

console.log(a);

b.addEventListener('click', ()=> {a.classList.remove('hid');p.classList.add('hid')});
c.addEventListener('click', ()=> {a.classList.add('hid');p.classList.remove('hid')});
e.addEventListener('click', ()=> {d.classList.remove('hid');p.classList.add('hid')});
f.addEventListener('click', ()=> {d.classList.add('hid');p.classList.remove('hid')});

window.onload = function() {
    var img = document.querySelectorAll('img');
    console.log(img.forEach(element => {
        element.addEventListener('click',show)
    }));
    var form = document.forms[0];
    console.log(form.formdata);
}

function show(event) {
    var a = event.currentTarget.src;
    console.log(a);
    var b = document.querySelector('.img-viewer');
    b.classList.remove('hid');
    var el = document.createElement('img');
    el.setAttribute('src',a);
    b.appendChild(el);
}


document.forms[0].onsubmit = (e) => {            
    e.preventDefault();

        
    const formData = new FormData(document.forms[0]);
    const data = Object.fromEntries(formData.entries());

    // console.log(JSON.stringify(data))

    dt = JSON.stringify(data);
    var x = new XMLHttpRequest();
    x.open('post','df_d3ls.php',true); // df_d3ls = index
    x.onload = function() {
        // document.body.innerHTML = this.responseText;
        console.log(this.response)
        alert("Contact US! and confirm your room.");
    }
    x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    x.send('data='+dt);
}


// document.forms[0].onsubmit = async (e) => {
//     e.preventDefault();
    
//     const formData = new FormData(document.forms[0]);
//     const data = Object.fromEntries(formData.entries());

//     console.log(JSON.stringify({data}))
    
//     try {
//         const response = await fetch('df_d3ls.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//             },
//             body: JSON.stringify({ data }),
//         });

//         if (response.ok) {
//             alert("Contact US! and confirm your room.");
//             // Optionally handle the response data if needed
//             const responseData = await response.json();
//             console.log(responseData)

//         } else {
//             throw new Error(`HTTP error! Status: ${response.status}`);
//         }
//     } catch (error) {
//         console.error('Error:', error.message);
//         // Handle the error, e.g., show an error message to the user
//     }
// };



// document.forms[1].onsubmit = (e) => {            
//     e.preventDefault();
//     dt = new FormData(document.forms[1])
//     console.log(dt)
//     dt = Array.from(dt.keys()).reduce((r, k) => {
//         r[k] = dt.get(k);
//         return r;
//     }, {});
//     dt = JSON.stringify(dt);
//     var x = new XMLHttpRequest();
//     x.open('post','dkj3902i_dfj9.php',true); // dkj3902i_dfj9 = check_status
//     x.onload = function() {
//         // document.body.innerHTML = this.responseText;
//         alert(this.responseText);
//     }
//     x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     x.send('data='+dt);
// }




document.forms[1].onsubmit = async (e) => {
    e.preventDefault();

    const formData = new FormData(document.forms[1]);
    const data = Object.fromEntries(formData.entries());

    try {
        const response = await fetch('dkj3902i_dfj9.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ data }),
        });

        if (response.ok) {
            alert(await response.text()); // Display the response text in an alert
            // Optionally handle the response data if needed
            // const responseData = await response.json();
        } else {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
    } catch (error) {
        console.error('Error:', error.message);
        // Handle the error, e.g., show an error message to the user
    }
};
