(() =>{
  var delJobs = document.querySelector('#delJobs'),
  editJobs = document.querySelector('#editJobs'),
  delJobsB = document.querySelector('#delJobsPanel'),
  editJobsB = document.querySelector('#editJobsPanel');
console.log("reveal fired");
  function delJobsToggle(){
    console.log("delete toggle panel");
    if (delJobs.style.display === "none"){
      delJobs.style.display = "block";
    }else{
      delJobs.style.display = "none";
    }
  };
  function editJobsToggle(){
    console.log("edit toggle panel");
    if (editJobs.style.display === "none"){
      editJobs.style.display = "block";
    }else{
      editJobs.style.display = "none";
    }
  };

  delJobsB.addEventListener('click', delJobsToggle, false);
  editJobsB.addEventListener('click', editJobsToggle, false);
})();
