
        const url = 'http://localhost:3000/';

        const fetchAPI = async function fetchAPI(url, options, cb, err) {
            await fetch(url, options)
                .then(res => res.json())
                .then(cb)
                .catch(err)
        }

        const error = function error(err) {
            console.log(err);
        }

        const successPost =  function successPost(data){
            console.log(data);
        }

        const successClass = function successClass(data) {
            let classE = document.querySelector('#list-catalog');
            let str = ''
            for (let i in data) {
                str += `<tr class="tabletd">

                            <td>${data[i].id}</td>
                            <td>${data[i].name}</td>
                            <td><button onClick="removeItem(${data[i].id})">Xóa</button</td>
                            <td><a href="#">Sửa</a></td>
                        </tr> `
            }
            classE.innerHTML = str;
            console.log(data);
        }
        const successPro = function successPro(data) {
            let formStudent = document.querySelector('#list-product');
            let strForm = '';
            for (let e in data) {
                const product = data[e];
                strForm += `<tr class="tabletd">
                                <td>${product.id}</td>
                                <td>${product.name}</td>
                                <td><img src="../images/${product.images}" alt=""></td>
                                <td>${product.price.toLocaleString("vi")+" VNĐ"}</td>
                                <td>${product.note}</td>
                                <td><a href="#">Xoa</a></td>
                                <td><a href="#">Sua</a></td>
                            </tr>`
            }
            formStudent.innerHTML = strForm;
            console.log(data);
        }



        const getClass = async function getClass() {
            let classUrl = url + 'Catalogs';
            let options = {
                method: 'GET'
            };
            await fetchAPI(classUrl, options, successClass, error)
        }

       /*  const successStudents = function successClass(data) {
            let classE = document.querySelector('#sv');
            let str = ''
            for (let i in data) {
                str += `<li>${data[i].name} - 
                <img src="images/${data[i].images}"> - ${data[i].price}</li>`
            }
            classE.innerHTML = str;
            console.log(data);
        } */

        const getPro = async function getPro() {
            let svUrl = url + 'products';
            let options = {
                method: 'GET'
            };
            await fetchAPI(svUrl, options, successPro, error)
        }

        const postData = async function postData(e){
            e.preventDefault();
            let classUrl = url + 'Catalogs';
            let data = {
                name: document.querySelector('#name').value
            }
            let options = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            };
            
            await fetchAPI(classUrl, options, successPost(data), error);
            
        }
        const removeItem = id =>{
            let storage = localStorage.getItem('catalog')
            if(storage){
                catalog = JSON.parse(storage)
            }
            catalog = catalog.filter(item => item.catalog.id != id)
            localStorage.setItem('catalog', JSON.stringify(catalog))
            location.reload();
        }

        const postStudent = async function postData(e){
            e.preventDefault();
            let classUrl = url + 'products';
            let data = {
                name: document.querySelector('#studentName').value,
                price: document.querySelector('#birth').value,
                note: document.querySelector('#address').value,
                images: document.querySelector('#idClass').value
            }
            let options = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            };
            await fetchAPI(classUrl, options, successPost(data), error);
        }

        window.onload = () => {
            getClass();
            getPro();
            document.querySelector('#postData').addEventListener('submit', postData);
            document.querySelector('#postStudent').addEventListener('submit', postStudent)
        }