var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });


}



$('#exampleModal').on('show.bs.modal')

// $('#invitation').click(function(){
//   if($('#invitation-div').hide()){
//     $('#invitation-div').show()
//   }else if($('#invitation-div').show()){
//   $('#invitation-div').hide()
//   }
// });

function invetation(){
  var invetationLink = document.getElementById('invitation-div');
  var show = document.getElementById('icon-eye');

  
  
  console.log(invetationLink.style.display == "");
  if(invetationLink.style.display == '')
  {
    invetationLink.style.display = 'block';
    show.innerHTML = '<i class="fa-solid fa-eye"></i>';
    
  }else if(invetationLink.style.display == 'block'){
    invetationLink.style.display = '';
    show.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';    
  }

}

function copy () {
  let el = document.getElementById('invitation-link').vlue;
    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
  
    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
    
    // Alert the copied text
    alert("Copied the text: " + copyText.value);
}


function copy() {
  var copyText = document.getElementById("copy").innerHTML = '<i class="copy fa-regular fa-clipboard"></i>';
  var copyText = document.getElementById("invitation-link");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  navigator.clipboard.writeText(copyText.value);
  
 
}

function outFunc() {
  var tooltip = document.getElementById("myTooltip");
  tooltip.innerHTML = "Copy to clipboard";
}



