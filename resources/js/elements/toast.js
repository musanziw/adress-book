import {toast} from "./alert";


export default class Toast extends HTMLElement {
    async connectedCallback() {
        await toast(this.getAttribute('type'), this.getAttribute('message'))
    }
}

// export default class Toast extends HTMLElement {
//     connectedCallback() {
//         this.innerHTML = `

//         `
//     }
// }