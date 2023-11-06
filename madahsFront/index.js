let bars = document.querySelector('#bars')
bars.addEventListener('click', e => {
    e.stopPropagation()
    document.querySelector("#navresponsive").classList.add("active")
})

document.body.addEventListener('click', e => {
    if (e.target.getAttribute("id") == "navresponsive") return
    document.querySelector("#navresponsive").classList.remove("active")
})

document.querySelector("#navresponsive").addEventListener("click", e => e.stopPropagation())