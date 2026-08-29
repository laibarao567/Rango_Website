const products=[
{id:1,name:"Blush Blossom Ring",cat:"Rings",price:1450,badge:"New",img:"images/00c56d51343a27eb42f544819c2e6f7d.jpg",desc:"A delicate floral ring with a tiny pressed blossom preserved in a clear finish."},
{id:2,name:"Butterfly Bloom Keychain",cat:"Keychains",price:1250,badge:"Bestseller",img:"images/16b413c9a7d485468e1c5fa16ec49167.jpg",desc:"A botanical butterfly keepsake for your keys, purse or favorite bag."},
{id:3,name:"Daisy Bloom Hair Clip",cat:"Accessories",price:1650,badge:"New",img:"images/3c3e671a757fe2b68b781c8e45cfa881.jpg",desc:"A pretty floral hair accessory with delicate white daisies captured in resin."},
{id:4,name:"Golden Moon Necklace",cat:"Necklaces",price:2100,badge:"",img:"images/3df83384a61b76e5af096d451f832099.jpg",desc:"A dreamy crescent necklace inspired by warm golden botanicals."},
{id:5,name:"Pressed Flower Keychain",cat:"Keychains",price:1250,badge:"",img:"images/4a7929067b09fac2c97cfe1c117d7a3b.jpg",desc:"A floral keepsake made for your keys or favorite bag."},
{id:6,name:"Ocean Bloom Ring",cat:"Rings",price:1450,badge:"New",img:"images/81b1505b1767842bdd192fd13cdb1c30.jpg",desc:"A glossy turquoise resin ring with a playful ocean-inspired finish."},
{id:7,name:"Daisy Hoop Earrings",cat:"Earrings",price:1850,badge:"Bestseller",img:"images/835fad748f6af4b3366072fc2dd07a1e.jpg",desc:"Lightweight floral hoops featuring cheerful white daisies."},
{id:8,name:"Lavender Petal Earrings",cat:"Earrings",price:1950,badge:"",img:"images/84abb8238907f78d913f58f4db1b680b.jpg",desc:"Elegant teardrop earrings with delicate purple botanical details."},
{id:9,name:"Pink Blossom Studs",cat:"Earrings",price:1650,badge:"New",img:"images/9de87458f925ee48c10f053b0a88ee43.jpg",desc:"Sweet pink floral studs for a soft everyday look."},
{id:10,name:"Green Leaf Earrings",cat:"Earrings",price:1850,badge:"",img:"images/b21cbee6e35acb3c3abd101889e460a5.jpg",desc:"Fresh green leaf-shaped earrings inspired by nature."},
{id:11,name:"Rose Garden Bracelet",cat:"Bracelets",price:2250,badge:"Bestseller",img:"images/d582c409b11379012bd4f62ed843c709.jpg",desc:"A romantic pink floral-bead bracelet with a delicate gold chain."},
{id:12,name:"Daisy Oval Pendant",cat:"Necklaces",price:2100,badge:"New",img:"images/e7d05f88b9de1fa7a50ac1fa7bf34c21.jpg",desc:"A botanical oval pendant with a tiny daisy preserved inside."},
];
let cart=JSON.parse(localStorage.getItem("rangoCart2")||"[]"),wish=JSON.parse(localStorage.getItem("rangoWish2")||"[]"),cat="All",current=null;

const $=s=>document.querySelector(s), $$=s=>[...document.querySelectorAll(s)], money=n=>"Rs. "+n.toLocaleString("en-PK");

function render(){
 let q=$("#searchInput").value.toLowerCase().trim(), list=products.filter(p=>(cat==="All"||p.cat===cat)&&`${p.name} ${p.cat} ${p.desc}`.toLowerCase().includes(q));
 let sort=$("#sortSelect").value;
 if(sort==="low")list.sort((a,b)=>a.price-b.price);
 if(sort==="high")list.sort((a,b)=>b.price-a.price);
 if(sort==="name")list.sort((a,b)=>a.name.localeCompare(b.name));
 $("#products").innerHTML=list.length?list.map(p=>`
 <article class="product-card">
  <div class="photo" onclick="openProduct(${p.id})">
   ${p.badge?`<span class="tag">${p.badge}</span>`:""}
   <button class="heart ${wish.includes(p.id)?"loved":""}" onclick="event.stopPropagation();toggleWish(${p.id})">${wish.includes(p.id)?"♥":"♡"}</button>
   <img src="${p.img}" alt="${p.name}" loading="lazy">
   <button class="quick" onclick="event.stopPropagation();addCart(${p.id})">Add to bag</button>
  </div>
  <div class="card-info"><div><h3>${p.name}</h3><p>${p.cat}</p></div><span class="price">${money(p.price)}</span></div>
 </article>`).join(""):`<div class="no-results"><h3>No little treasure found.</h3><p>Try another category or search.</p></div>`;
 updateCount();
}
function updateCount(){$("#cartCount").textContent=cart.reduce((a,b)=>a+b.qty,0)}
function save(){localStorage.setItem("rangoCart2",JSON.stringify(cart));localStorage.setItem("rangoWish2",JSON.stringify(wish));updateCount()}
function addCart(id,qty=1){let x=cart.find(i=>i.id===id);x?x.qty+=qty:cart.push({id,qty});save();renderCart();toast("Added to your bag ♡")}
function changeQty(id,d){let x=cart.find(i=>i.id===id);if(!x)return;x.qty+=d;if(x.qty<1)cart=cart.filter(i=>i.id!==id);save();renderCart()}
function removeItem(id){cart=cart.filter(i=>i.id!==id);save();renderCart()}
function toggleWish(id){wish.includes(id)?wish=wish.filter(x=>x!==id):wish.push(id);save();render();toast(wish.includes(id)?"Saved to your wishlist ♡":"Removed from wishlist")}
function renderCart(){
 if(!cart.length){$("#cartItems").innerHTML="";$("#emptyCart").style.display="block";$("#cartFooter").style.display="none";return}
 $("#emptyCart").style.display="none";$("#cartFooter").style.display="block";let total=0;
 $("#cartItems").innerHTML=cart.map(i=>{let p=products.find(x=>x.id===i.id);total+=p.price*i.qty;return `<div class="cart-row"><div class="cart-img"><img src="${p.img}" alt=""></div><div><h4>${p.name}</h4><small>${money(p.price)}</small><div class="controls"><button onclick="changeQty(${p.id},-1)">−</button><span>${i.qty}</span><button onclick="changeQty(${p.id},1)">+</button><button class="remove" onclick="removeItem(${p.id})">Remove</button></div></div><strong>${money(p.price*i.qty)}</strong></div>`}).join("");
 $("#subtotal").textContent=money(total)
}
function openCart(){renderCart();$("#drawer").classList.add("open");$("#backdrop").classList.add("open")}
function closeCart(){$("#drawer").classList.remove("open");$("#backdrop").classList.remove("open")}
function openModal(id){$("#"+id).classList.add("open")}
function closeModal(id){$("#"+id).classList.remove("open")}
function openProduct(id){let p=products.find(x=>x.id===id);current=p;$("#productDetail").innerHTML=`<div class="product-detail"><div class="detail-photo"><img src="${p.img}" alt="${p.name}"></div><div class="detail-copy"><p class="small-label">${p.cat}</p><h2>${p.name}</h2><div class="detail-price">${money(p.price)}</div><p>${p.desc}</p><p>Every Rango piece is handmade in small batches. Natural variations in flowers and resin are part of what makes your piece yours.</p><button class="dark-btn add-detail" onclick="addCart(${p.id});closeModal('productModal');openCart()">Add to bag ♡</button></div></div>`;openModal("productModal")}
function toast(msg){let t=$("#toast");t.textContent=msg;t.classList.add("show");clearTimeout(window.tt);window.tt=setTimeout(()=>t.classList.remove("show"),2200)}

$$(".filter").forEach(b=>b.addEventListener("click",()=>{$$(".filter").forEach(x=>x.classList.remove("active"));b.classList.add("active");cat=b.dataset.cat;render()}));
$("#searchInput").addEventListener("input",render);$("#sortSelect").addEventListener("change",render);
$("#cartBtn").addEventListener("click",openCart);$("#closeCart").addEventListener("click",closeCart);$("#backdrop").addEventListener("click",closeCart);
$("#menuBtn").addEventListener("click",()=>$("#mobileMenu").classList.toggle("open"));
$$(".mobile-menu a").forEach(a=>a.addEventListener("click",()=>$("#mobileMenu").classList.remove("open")));
$$("[data-close]").forEach(b=>b.addEventListener("click",()=>closeModal(b.dataset.close)));
$$(".modal").forEach(m=>m.addEventListener("click",e=>{if(e.target===m)m.classList.remove("open")}));
$("#customBtn").addEventListener("click",()=>openModal("customModal"));
$("#checkoutBtn").addEventListener("click",()=>{
 if(!cart.length){toast("Your bag is empty.");return}
 let total=0;$("#checkoutSummary").innerHTML=cart.map(i=>{let p=products.find(x=>x.id===i.id);total+=p.price*i.qty;return `<div class="summary-line"><span>${p.name} × ${i.qty}</span><strong>${money(p.price*i.qty)}</strong></div>`}).join("")+`<hr><div class="summary-line"><b>Total</b><b>${money(total)}</b></div>`;
 closeCart();openModal("checkoutModal")
});
$("#checkoutForm").addEventListener("submit",e=>{e.preventDefault();localStorage.setItem("rangoLastOrder2",JSON.stringify({customer:Object.fromEntries(new FormData(e.target)),items:cart,date:new Date().toISOString()}));cart=[];save();renderCart();e.target.reset();closeModal("checkoutModal");toast("Order received! ♡")});
$("#customForm").addEventListener("submit",e=>{e.preventDefault();localStorage.setItem("rangoCustom2",JSON.stringify(Object.fromEntries(new FormData(e.target))));e.target.reset();closeModal("customModal");toast("Custom request saved ♡")});
$("#newsletter").addEventListener("submit",e=>{e.preventDefault();localStorage.setItem("rangoEmail",$("#email").value);e.target.reset();toast("Welcome to Rango ♡")});
document.addEventListener("keydown",e=>{if(e.key==="Escape"){closeCart();$$(".modal").forEach(m=>m.classList.remove("open"))}});
render();renderCart();
