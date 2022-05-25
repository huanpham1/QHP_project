const plus = document.querySelector('.plus');
const minus = document.querySelector('.minus');
plus.onclick = function(){
    let SLC = document.querySelector(".SLC").value;
    const box = document.querySelector('.input-qty');
    if(Number(box.value)<Number(SLC)){
        box.value= Number(box.value) + 1;
    }
    else{
        console.log("Số lượng không hợp lệ" + SLC);
    }

}
minus.onclick = function(){
    const box = document.querySelector('.input-qty');
    if(Number(box.value)>1)
        box.value= Number(box.value) - 1;
}
async function getsl(url = 'http://127.0.0.1:8000/getsl', data = {}) {
  // Default options are marked with *
    fetch(url, {
    method: 'GET', // or 'PUT'
    // headers: {
    //     'Content-Type': 'application/json',
    // },

    })
    .then(response => response.json())
    .then(response => {
        console.log('Success:', response);
    })
    .catch((error) => {
    console.error('Error:', error);
    });
}
async function getSL(ma){
        const url = 'http://127.0.0.1:8000/getsl'
        const size = document.getElementById("size").value;
        const data = { MaSP: ma, Size: size };
        const sl = document.querySelector(".kq");
        // console.log(data)
        // console.log(giatri);

        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        fetch('/getsl', {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        })
        .then(response => response.json())
        .then(response => {
            sl.innerHTML = 'còn ' + response + ' sản phẩm';
        })
        .catch((error) => {
        console.error('Error:', error);
        });
    }
    async function ThemGH(ma){
        const size = document.getElementById("size").value;
        const sl = document.querySelector(".input-qty").value;
        const data = { MaSP: ma, SoLuong: sl, Size: size };
        // console.log(sl);
        // console.log(data)
        // console.log(giatri);

        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        fetch('/ThemGH', {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        })
        .then(response => response.json())
        .then(response => {
            console.log(response);
        })
        .catch((error) => {
        console.error('Error:', error);
        });
        async function ThemGH(ma){
            const size = document.getElementById("size").value;
            const sl = document.querySelector(".input-qty").value;
            const data = { MaSP: ma, SoLuong: sl, Size: size };
            // console.log(sl);
            // console.log(data)
            // console.log(giatri);

            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            fetch('/ThemGH', {
                method: 'post',
                body: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            })
            .then(response => response.json())
            .then(response => {
                console.log(response);
            })
            .catch((error) => {
            console.error('Error:', error);
            });
}}

