const change = () => {
  const check1 = (document.getElementById("check1") as HTMLInputElement)?.checked ?? false;
  const check2 = (document.getElementById("check2") as HTMLInputElement)?.checked ?? false;
  const check3 = (document.getElementById("check3") as HTMLInputElement)?.checked ?? false;
  const check4 = (document.getElementById("check4") as HTMLInputElement)?.checked ?? false;
  const check5 = (document.getElementById("check5") as HTMLInputElement)?.checked ?? false;

  const checkBtn = document.getElementById("check-btn") as HTMLButtonElement | null;

  if (checkBtn) {
      checkBtn.disabled = !(check1 && check2 && check3 && check4 && check5);
  }
};

const submitChk = (): boolean => {
  const flag: boolean = confirm("OK！\n\nすべてそろっています");
  return flag;
};