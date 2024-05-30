function generate() {
    var nom=document.getElementById("nom").value;
    var prenom=document.getElementById("prenom").value;
    var rue=document.getElementById('adresse').value;
    var codepostal=document.getElementById('codepostal').value;
    var ville=document.getElementById('ville').value;
    var email=document.getElementById('mail').value;
    var numtel=document.getElementById('numtel').value;
    var activites=document.getElementById('activites').value.split("\n");
    var langues=document.getElementById('langues').value.split("\n");
    var informatique=document.getElementById('informatique').value.split("\n");
    var photo=document.getElementById('photo').files[0];
    const languesText = langues.map(line=>new docx.TextRun({break:1,text:line}));
    const activitesText = activites.map(line=>new docx.TextRun({break:1,text:line}));
    const infoText = informatique.map(line=>new docx.TextRun({break:1,text:line}));
    var education=[];
    var indice=0;
    for(var i=0;i<=document.getElementById("nbreEduc").innerHTML;i++){
      var desc=document.getElementById('desceduc'+i).value.split("\n");
      education[indice]=new docx.TextRun({break:1,text:document.getElementById('nomeduc'+i).value})
      education[indice+1]=new docx.TextRun({break:1,text:(document.getElementById('lieueduc'+i).value+" "+document.getElementById('dateeduc'+i).value)})
      for(var j=0;j<desc.length;j++){
        education[indice+2+j]=new docx.TextRun({break:1,text:("   "+desc[j])});
      }
      education[indice+desc.length+2]=new docx.TextRun({break:1,text:""});
      indice=indice+desc.length+3;
    }
    var projets=[];
    indice=0;
    for(var i=0;i<=document.getElementById("nbreProj").innerHTML;i++){
      var desc=document.getElementById('descprojet'+i).value.split("\n");
      projets[indice]=new docx.TextRun({break:1,text:document.getElementById('titreprojet'+i).value})
      projets[indice+1]=new docx.TextRun({break:1,text:(document.getElementById('lieuprojet'+i).value+" "+document.getElementById('dateprojet'+i).value)})
      for(var j=0;j<desc.length;j++){
        projets[indice+2+j]=new docx.TextRun({break:1,text:("   "+desc[j])});
      }
      projets[indice+desc.length+2]=new docx.TextRun({break:1,text:""});
      indice=indice+desc.length+3;
    }
    var experiences=[];
    var indice=0;
    for(var i=0;i<=document.getElementById("nbreExp").innerHTML;i++){
      var desc=document.getElementById('descexp'+i).value.split("\n");
      experiences[indice]=new docx.TextRun({break:1,text:document.getElementById('nomexp'+i).value})
      experiences[indice+1]=new docx.TextRun({break:1,text:(document.getElementById('lieuexp'+i).value+" "+document.getElementById('dateexp'+i).value)})
      for(var j=0;j<desc.length;j++){
        experiences[indice+2+j]=new docx.TextRun({break:1,text:("   "+desc[j])});
      }
      experiences[indice+desc.length+2]=new docx.TextRun({break:1,text:""});
      indice=indice+desc.length+3;
    }
    const doc = new docx.Document({
      sections: [{
        properties: {
          page: {
            margin: {
                top: 1000,
                right: 1000,
                bottom: 1000,
                left: 1000,
            },
        },
        },
        children: [
         /* new docx.Paragraph({
            children:[
            new docx.ImageRun({
              data: fs.readFileSync("../img/photocv.png"),
              floating: {
                  horizontalPosition: {
                      offset: 1014400,
                  },
                  verticalPosition: {
                      offset: 1014400,
                  },
              },
            })
          ]
          }),*/
          new docx.Paragraph({
            children: [
                new docx.ImageRun({
                    data:photo,
                    transformation: {
                      width: 100,
                      height: 133.33,
                    },
                    floating: {
                      horizontalPosition: {
                          offset: 5714400,
                      },
                      verticalPosition: {
                          offset: 800000,
                      },
                    }
                }),
            ],
          }),
          new docx.Paragraph({
            text:`${prenom} ${nom}`,
            style:"main",
          }),
          new docx.Paragraph({
            text:`${rue}`,
            style:"main",
          }),
          new docx.Paragraph({
            text:`${codepostal} ${ville}`,
            style:"main",
          }),
          new docx.Paragraph({
            text:`France`,
            style:"main",
          }),
          new docx.Paragraph({
            text:`${numtel}`,
            style:"main",
          }),
          new docx.Paragraph({
            text:`${email}`,
            style:"main",
          }),
          new docx.Paragraph({
            text:` `,
            style:"main",
          }),
          new docx.Paragraph({
            text:`Education`,
            style:"bold",
          }),
          new docx.Paragraph({
            text:`_____________________________________________________________________________________________________________________________________________________________________`,
            style:"lignenoir",
          }),
          new docx.Paragraph({
            children:education,
            style:"main",
          }),
          new docx.Paragraph({
            text:`Engineering Projects`,
            style:"bold",
          }),
          new docx.Paragraph({
            text:`_____________________________________________________________________________________________________________________________________________________________________`,
            style:"lignenoir",
          }),
          new docx.Paragraph({
            children:projets,
            style:"main",
          }),
          new docx.Paragraph({
            text:`Employment Experience`,
            style:"bold",
          }),
          new docx.Paragraph({
            text:`_____________________________________________________________________________________________________________________________________________________________________`,
            style:"lignenoir",
          }),
          new docx.Paragraph({
            children:experiences,
            style:"main",
          }),
          new docx.Paragraph({
            text:`Computer Skills`,
            style:"bold",
          }),
          new docx.Paragraph({
            text:`_____________________________________________________________________________________________________________________________________________________________________`,
            style:"lignenoir",
          }),
          new docx.Paragraph({
            children:infoText,
            style:"main",
          }),
          new docx.Paragraph({
            text:`Languages`,
            style:"bold",
          }),
          new docx.Paragraph({
            text:`_____________________________________________________________________________________________________________________________________________________________________`,
            style:"lignenoir",
          }),
          
          new docx.Paragraph({
            children:languesText,
            style:"main",
          }),
          new docx.Paragraph({
            text:`Activities and Interests`,
            style:"bold",
          }),
          new docx.Paragraph({
            text:`_____________________________________________________________________________________________________________________________________________________________________`,
            style:"lignenoir",
          }),
          new docx.Paragraph({
            children:activitesText,
            style:"main",
          }),
          
        ],
      }],
      styles: {
        paragraphStyles: [
            {
                id: "main",
                name: "Main",
                basedOn: "Normal",
                next: "Normal",
                run: {
                    size:24,
                },
            },
            {
                id: "bold",
                name: "Bold",
                basedOn: "Normal",
                next: "Normal",
                run: {
                    bold: true,
                    size:24,
                  },paragraph: {
                    spacing: {
                        before: 200,
                    },
                },
            },
            {
                id: "lignenoir",
                name: "LigneNoir",
                basedOn: "Normal",
                next: "Normal",
                run: {
                    size:12,
                },paragraph: {
                    spacing: {
                        before: 0,
                        after: 120,
                    },
                },
            },
            
        ],
    }
    });

    docx.Packer.toBlob(doc).then(blob => {
      console.log(blob);
      saveAs(blob, `cv ${nom} ${prenom}.docx`);
      console.log("CV généré");
    });
  }