// export class Service {
//     constructor() {
//     }
//
//     getAllProducts(param = null) {
//         let listProducts = [];
//         fetch(`https://prod/shop/catalog${param ? '/category' + param : ''}`)
//             .then(response => response.json())
//             .then(json => listProducts = json)
//             .then(listProducts => {
//                 listProducts.forEach((product) => {
//                     shopList.innerHTML += `
//                 <article class="shop__item product" tabindex="0">
//                   <div class="product__image">
//                     <img src="img/products/${product.img}" alt="product-name">
//                   </div>
//                   <p class="product__name">${product.name}</p>
//                   <span class="product__price">${product.price} руб.</span>
//                 </article>
//                 `
//                     ;
//                 })
//             });
//     }
// }