# Forensics / Excel Confidential

## Challenge (200 points)
Dans le dossier contenant les fichiers uploadés, nous avons trouvé un fichier excel.
Lise MITENER nous confirme que ce document ne lui appartient pas.
Le document est protégé par un mot de passe. Trouver un moyen d'accéder à l'information que contient ce tableur.

Bien commencer: Les documents excel ont tous une architecture semblable, il existe surement une méthode simple pour outrepasser la protection.

## Inputs
- Excel file: [CONFIDENTIEL.xlsx](./CONFIDENTIEL.xlsx)
- Web site: `ia.challenge.operation-kernel.fr`

## Solution
Let's `unzip` the `Excel` file to extract the file structure:

```shell
$ unzip CONFIDENTIEL.xlsx
Archive:  CONFIDENTIEL.xlsx
  inflating: [Content_Types].xml
  inflating: _rels/.rels
  inflating: xl/workbook.xml
  inflating: xl/_rels/workbook.xml.rels
  inflating: xl/worksheets/sheet1.xml
  inflating: xl/worksheets/sheet2.xml
  inflating: xl/theme/theme1.xml
  inflating: xl/styles.xml
  inflating: xl/sharedStrings.xml
  inflating: xl/drawings/drawing1.xml
 extracting: xl/media/image1.png
 extracting: xl/media/image2.png
  inflating: xl/worksheets/_rels/sheet1.xml.rels
  inflating: xl/worksheets/_rels/sheet2.xml.rels
  inflating: xl/drawings/_rels/drawing1.xml.rels
  inflating: xl/printerSettings/printerSettings1.bin
  inflating: xl/tables/table1.xml
  inflating: docProps/core.xml
  inflating: docProps/app.xml
```

Then simply recurively `grep` for `HACK` in the extracted file structure and find the flag in file `xl/sharedStrings.xml`.

## Flag
HACK{3xcEl_R3al_Pr0TeCT10N?}
