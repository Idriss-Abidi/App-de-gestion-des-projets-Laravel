// const form = document.getElementById("chat-form");
// const form2 = document.getElementById("chat-form2");
// const gpt = document.getElementById("chat-input");
// const action = document.getElementById('options');
// const action2 = document.getElementById('options2');
// const reponse = document.getElementById('reponse');
// const submit1 = document.getElementById('submit1');
// const apiKey =""; /*Add your ApiOpenAI key*/
// let hasFunctionBeenCalled = false;
// let hasFunctionBeenCalled2 = false;
// let hasFunctionBeenCalled3 = false;
// let hasFunctionBeenCalled4 = false;

// function myFunction() {
//     action.innerHTML="";
//     if (hasFunctionBeenCalled) {
//     return;}
//     hasFunctionBeenCalled = true;
//     form.addEventListener("submit", async (e) => {
//     document.getElementById("loading").style.display = "block";
//     e.preventDefault();
//     const message = gpt.value;
//     const response = await axios.post(
//         "https://api.openai.com/v1/completions",
//         {
//         prompt: "Des actions pour ce projet:"+message+"(numérotées et en francais)",
//         model: "text-davinci-003",
//         temperature: 0.8,
//         max_tokens: 1000,
//         top_p: 1,
//         frequency_penalty: 0.0,
//         presence_penalty: 0.0,
//         },
//         {
//         headers: {
//             "Content-Type": "application/json",
//             Authorization: `Bearer ${apiKey}`,
//         },
//         }
//     );
//     const chatbotResponse2 = response.data.choices[0].text.split("\n");
//     Tab=[];
//     for (let i = 0; i < chatbotResponse2.length-2; i++) {
//         Tab[i]=(chatbotResponse2[i+2]);
//     }
//     document.getElementById("loading").style.display = "none";
//     for(i=0;i<Tab.length;i++) if(Tab[i]!=='')
//     {if(Tab[i][0]>0 && Tab[i][0]<100)
//         action.innerHTML+=`<div class="form-check">
//         <input  class="form-check-input" type="checkbox" id="action${i}" name="action[]" value="${Tab[i]}">
//         <label class="form-check-label" for="action${i}"> ${Tab[i]}</label><br></div>`;}
//     });
// }

// function myFunction2(){
//     if (hasFunctionBeenCalled2) {
//     return;
//     }
//     hasFunctionBeenCalled2 = true;
// form.addEventListener("submit", async (e) => {

// 	action2.innerHTML="";
// 	document.getElementById("loading2").style.display = "block";
//     e.preventDefault();
//     const message2 = gpt.value;

//     const response = await axios.post(
//     "https://api.openai.com/v1/completions",
//     {
//     prompt: "donnez moi des questions pour ce projet: "+message2+"(ecrire en francais)",
//     model: "text-davinci-003",
//     temperature: 0.8,
//     max_tokens: 1000,
//     top_p: 1,
//     frequency_penalty: 0.0,
//     presence_penalty: 0.0,
//     },
//     {
//     headers: {
//         "Content-Type": "application/json",
//         Authorization: `Bearer ${apiKey}`,
//     },
//     }
//     );
//     const chatbotResponse3 = response.data.choices[0].text.split("\n");
//     Tab=[];
//     for (let i = 0; i < chatbotResponse3.length-2; i++) {
//     Tab[i]=(chatbotResponse3[i+2]);    }
// 	document.getElementById("loading2").style.display = "none";
//     for(i=0;i<Tab.length;i++) if(Tab[i]!=='')
//     {
//     action2.innerHTML+=`<div class="form-check">
// 	<input  class="form-check-input" type="checkbox" id="quest${i}" name="quest[]" value="${Tab[i]}">
//     <label class="form-check-label" for="quest${i}"> ${Tab[i]}</label><br><input type="text" placeholder="Entrez votre reponse ici"
//     style="flex-grow: 1; padding: 10px;margin-right: 10px;border-radius: 10px;border: 1px solid #ccc; width: calc(100% - 150px);" name="rps${i}" id="rps${i}">
//     <br></div>`;
//     }
// });
// }

// function myFunction3() {
//     if (hasFunctionBeenCalled3) {
//     return;
//     }
//     hasFunctionBeenCalled3 = true;
//     form2.addEventListener("submit", async (e) => {
//     e.preventDefault();
//     reponse.innerHTML = "";
//     document.getElementById("loading3").style.display = "block";
//     const checkboxes = document.querySelectorAll('input[name="quest[]"]:checked');
//     const questValues = [];
//     checkboxes.forEach((checkbox) => {
//     questValues.push(checkbox.value);
//     });
//     const responses = [];
//     for (let i = 0; i < questValues.length; i++) {
//     const rp = document.getElementById(`rps${i}`).value;
//     if (rp !== "") {
//         responses.push(rp);
//     }
//     }
//     const projet=gpt.value;
//     const message3 = questValues.join("\n");
//     const response = await axios.post(
//     "https://api.openai.com/v1/completions",
//     {
//         prompt: "Concernant mon projet de "+projet+", donnez moi une description générale pour ces questions avec exemples: \n" + message3,
//         model: "text-davinci-003",
//         temperature: 0.8,
//         max_tokens: 1000,
//         top_p: 1,
//         frequency_penalty: 0.0,
//         presence_penalty: 0.0,
//     },
//     {
//         headers: {
//         "Content-Type": "application/json",
//         Authorization: `Bearer ${apiKey}`,
//         },
//     }
//     );
//     const chatbotResponse4 = response.data.choices[0].text
//   .replace(/^\s+/, '') // Remove line break at the beginning of the string
//   .replace(/\n/g, "<br>"); // Replace all line breaks with <br> tags
//     reponse.innerHTML =`<p style="white-space: pre-wrap">${chatbotResponse4}</p>`;
//     document.getElementById("loading3").style.display = "none";
//     });
// }


// function myFunction4() {
//     if (hasFunctionBeenCalled4) {
//     return;
//     }
//     hasFunctionBeenCalled4 = true;

//     form2.addEventListener("submit", async (e) => {
//     e.preventDefault();
//     action.innerHTML="";
//     document.getElementById("loading").style.display = "block";
//     const checkboxes = document.querySelectorAll('input[name="quest[]"]:checked');
//     const questValues = [];
//     const answerValues = [];
//     checkboxes.forEach((checkbox) => {
//         questValues.push(checkbox.value);
//         const questId = checkbox.getAttribute('id').replace('quest', 'rps');
//         const rpsInput = document.querySelector('#'+questId).value;
//         answerValues.push(rpsInput);
//     });
//     const projet=gpt.value;
//     let message4 = "";
//     for (let i = 0; i < questValues.length; i++) {
//         message4 += questValues[i] + answerValues[i] + ",";
//     }
//     const response = await axios.post(
//         "https://api.openai.com/v1/completions",
//         {
//         prompt: "Concerant mon projet de "+projet+", donnez moi des actions pour le réaliser et voici quelques question/reponse pour plus de details: \n" + message4,
//         model: "text-davinci-003",
//         temperature: 0.8,
//         max_tokens: 1000,
//         top_p: 1,
//         frequency_penalty: 0.0,
//         presence_penalty: 0.0,
//         },
//         {
//         headers: {
//             "Content-Type": "application/json",
//             Authorization: `Bearer ${apiKey}`,
//         },
//         }
//         );
//         const chatbotResponse5 = response.data.choices[0].text.split("\n");
//         console.log(chatbotResponse5);
//         Tab=[];
//         for (let i = 0; i < chatbotResponse5.length; i++) {
//         Tab[i]=(chatbotResponse5[i+2]);
//         }
//         document.getElementById("loading").style.display = "none";
//         for(i=0;i<Tab.length;i++) if(Tab[i]!=='')
//         {
//         if(Tab[i][0] !=null && Tab[i][0]>0 && Tab[i][0]<100)
//         action.innerHTML+=`<div class="form-check">
//         <input  class="form-check-input" type="checkbox" id="action${i}" name="action[]" value="${Tab[i]}">
//         <label class="form-check-label" for="action${i}"> ${Tab[i]}</label><br></div>`;
//         }
//     });
// }

// function myFunction5() {
//     action.innerHTML="";
//     if (hasFunctionBeenCalled4) {
//     return;
//     }
//     hasFunctionBeenCalled4 = true;
//     form2.addEventListener("submit", async (e) => {
//     document.getElementById("loading").style.display = "block";

//     e.preventDefault();
//     const projet = gpt.value;
//       // gpt.value = "";
//     const checkboxes = document.querySelectorAll('input[name="quest[]"]:checked');
//     const questValues = [];
//     const answerValues = [];
//     checkboxes.forEach((checkbox) => {
//         questValues.push(checkbox.value);
//         const questId = checkbox.getAttribute('id').replace('quest', 'rps');
//         const rpsInput = document.querySelector('#'+questId).value;
//         answerValues.push(rpsInput);
//     });
//     let message4 = "";
//     for (let i = 0; i < questValues.length; i++) {
//         message4 += questValues[i] +" "+ answerValues[i] + ", ";
//     }
//     const response = await axios.post(
//         "https://api.openai.com/v1/completions",
//         {
//         prompt: "Concernant mon projet de"+projet+", donnez-moi des actions spécifiques pour le réaliser sachant que: " + message4,
//         model: "text-davinci-003",
//         temperature: 0.8,
//         max_tokens: 1000,
//         top_p: 1,
//         frequency_penalty: 0.0,
//         presence_penalty: 0.0,
//         },
//         {
//         headers: {
//             "Content-Type": "application/json",
//             Authorization: `Bearer ${apiKey}`,
//         },
//         }
//     );
//     const chatbotResponse2 = response.data.choices[0].text.split("\n");
//     Tab=[];
//     console.log(chatbotResponse2);
//     for (let i = 0; i < chatbotResponse2.length-2; i++) {
//         Tab[i]=(chatbotResponse2[i+2]);
//     }
//     document.getElementById("loading").style.display = "none";
//     for(i=0;i<Tab.length;i++) if(Tab[i]!=='')
//     {
//         if(Tab[i][0]>0 && Tab[i][0]<100)
//         action.innerHTML+=`<div class="form-check">
//         <input  class="form-check-input" type="checkbox" id="action${i}" name="action[]" value="${Tab[i]}">
//         <label class="form-check-label" for="action${i}"> ${Tab[i]}</label><br></div>`;
//     }
//     });
// }
