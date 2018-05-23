  function setViewerConfigs(configOrig)
  {
    configOrig = JSON.parse(configOrig);
    console.log(configOrig);
    var render2DConfigsCurrent = Kekule.Render.Render2DConfigs.getInstance();

    // render2DConfigsOrig.setGeneralConfigs(currentConfig.generalConfigs);
    // render2DConfigsOrig.setMoleculeDisplayConfigs(currentConfig.moleculeDisplayConfigs);
    // render2DConfigsOrig.setDisplayLabelConfigs(currentConfig.displayLabelConfigs);
    // render2DConfigsOrig.setTextFontConfigs(currentConfig.textFontConfigs);
    // render2DConfigsOrig.setColorConfigs(currentConfig.colorConfigs);
    // render2DConfigsOrig.getMoleculeDisplayConfigs().setPropValue("defMoleculeDisplayType",currentConfig.moleculeDisplayConfigs.__$defMoleculeDisplayType, true)
    
    var generalConfigs = render2DConfigsCurrent.getGeneralConfigs();
    generalConfigs.setPropValue("allowCoordBorrow",configOrig.generalConfigs.__$allowCoordBorrow, true);
    generalConfigs.setPropValue("drawOpacity",configOrig.generalConfigs.__$drawOpacity, true);

    var moleculeDisplayConfigs = render2DConfigsCurrent.getMoleculeDisplayConfigs();
    moleculeDisplayConfigs.setPropValue("defMoleculeDisplayType",configOrig.moleculeDisplayConfigs.__$defMoleculeDisplayType, true);
    moleculeDisplayConfigs.setPropValue("defNodeDisplayMode",configOrig.moleculeDisplayConfigs.__$defNodeDisplayMode, true);
    moleculeDisplayConfigs.setPropValue("defHydrogenDisplayLevel",configOrig.moleculeDisplayConfigs.__$defHydrogenDisplayLevel, true);
    moleculeDisplayConfigs.setPropValue("defChargeMarkType",configOrig.moleculeDisplayConfigs.__$defChargeMarkType, true);
    moleculeDisplayConfigs.setPropValue("partialChargeDecimalsLength",configOrig.moleculeDisplayConfigs.__$partialChargeDecimalsLength, true);
    moleculeDisplayConfigs.setPropValue("defMoleculeDisplayType",configOrig.moleculeDisplayConfigs.__$defMoleculeDisplayType, true);

    var displayLabelConfigs = render2DConfigsCurrent.getDisplayLabelConfigs();
    // displayLabelConfigs.setPropValue("anyAtom",configOrig.displayLabelConfigs.anyAtom, true);
    displayLabelConfigs.setEnableIsotopeAlias(configOrig.displayLabelConfigs.enableIsotopeAlias),
    displayLabelConfigs.setUnsetElement(configOrig.displayLabelConfigs.unsetElement),
    displayLabelConfigs.setDummyAtom(configOrig.displayLabelConfigs.dummyAtom),
    displayLabelConfigs.setHeteroAtom(configOrig.displayLabelConfigs.heteroAtom),
    displayLabelConfigs.setAnyAtom(configOrig.displayLabelConfigs.anyAtom),
    displayLabelConfigs.setVariableAtom(configOrig.displayLabelConfigs.variableAtom),
    displayLabelConfigs.setRgroup(configOrig.displayLabelConfigs.rgroup),
    displayLabelConfigs.setIsoListLeadingBracket(configOrig.displayLabelConfigs.isoListLeadingBracket),
    displayLabelConfigs.setIsoListTailingBracket(configOrig.displayLabelConfigs.isoListTailingBracket),
    displayLabelConfigs.setIsoListDelimiter(configOrig.displayLabelConfigs.isoListDelimiter),
    displayLabelConfigs.setIsoListDisallowPrefix(configOrig.displayLabelConfigs.isoListDisallowPrefix)

    // moleculeDisplayConfigs.setPropValue("defMoleculeDisplayType",configOrig.moleculeDisplayConfigs.__$defMoleculeDisplayType, true);e.log(configOrig.displayLabelConfigs);
    // console.log(configOrig.displayLabelConfigs);

    var textFontConfigs = render2DConfigsCurrent.getTextFontConfigs();
    textFontConfigs.setPropValue("labelFontFamily",configOrig.textFontConfigs.__$labelFontFamily, true);
    textFontConfigs.setPropValue("atomFontFamily",configOrig.textFontConfigs.__$atomFontFamily, true);
    textFontConfigs.setPropValue("supFontSizeRatio",configOrig.textFontConfigs.__$supFontSizeRatio, true);
    textFontConfigs.setPropValue("subFontSizeRatio",configOrig.textFontConfigs.__$subFontSizeRatio, true);
    textFontConfigs.setPropValue("superscriptOverhang",configOrig.textFontConfigs.__$superscriptOverhang, true);
    textFontConfigs.setPropValue("subscriptOversink",configOrig.textFontConfigs.__$subscriptOversink, true);
    textFontConfigs.setPropValue("textCharDirection",configOrig.textFontConfigs.__$textCharDirection, true);
    textFontConfigs.setPropValue("textHorizontalAlign",configOrig.textFontConfigs.__$textHorizontalAlign, true);
    textFontConfigs.setPropValue("textVerticalAlign",configOrig.textFontConfigs.__$textVerticalAlign, true);

    var lengthConfigs = render2DConfigsCurrent.getLengthConfigs();

    // lengthConfigs.setPropValue("unitLength",configOrig.textFontConfigs.__$unitLength, true);

    lengthConfigs.setPropValue("labelFontSize",configOrig.lengthConfigs.__$labelFontSize, true);
    lengthConfigs.setPropValue("atomFontSize",configOrig.lengthConfigs.__$atomFontSize, true);
    lengthConfigs.setPropValue("chargeMarkFontSize",configOrig.lengthConfigs.__$chargeMarkFontSize, true);
    lengthConfigs.setPropValue("chargeMarkMargin",configOrig.lengthConfigs.__$chargeMarkMargin, true);
    lengthConfigs.setPropValue("allenCenterAtomRadius",configOrig.lengthConfigs.__$allenCenterAtomRadius, true);
    lengthConfigs.setPropValue("defBondLength",configOrig.lengthConfigs.__$defBondLength, true);
    lengthConfigs.setPropValue("bondLineWidth",configOrig.lengthConfigs.__$bondLineWidth, true);      
    lengthConfigs.setPropValue("hashSpacing",configOrig.lengthConfigs.__$hashSpacing, true);
    lengthConfigs.setPropValue("multipleBondSpacingRatio",configOrig.lengthConfigs.__$multipleBondSpacingRatio, true);
    lengthConfigs.setPropValue("multipleBondMaxAbsSpacing",configOrig.lengthConfigs.__$multipleBondMaxAbsSpacing, true);

    lengthConfigs.setPropValue("bondArrowLength",configOrig.lengthConfigs.__$bondArrowLength, true);
    lengthConfigs.setPropValue("bondArrowWidth",configOrig.lengthConfigs.__$bondArrowWidth, true);
    lengthConfigs.setPropValue("bondWedgeWidth",configOrig.lengthConfigs.__$bondWedgeWidth, true);
    lengthConfigs.setPropValue("bondWedgeHashMinWidth",configOrig.lengthConfigs.__$bondWedgeHashMinWidth, true);
    lengthConfigs.setPropValue("bondWavyRadius",configOrig.lengthConfigs.__$bondWavyRadius, true);
    lengthConfigs.setPropValue("glyphStrokeWidth",configOrig.lengthConfigs.__$glyphStrokeWidth, true);                           
    lengthConfigs.setPropValue("defScaleRefLength",configOrig.lengthConfigs.__$defScaleRefLength, true);                              
    lengthConfigs.setPropValue("autofitContextPadding",configOrig.lengthConfigs.__$autofitContextPadding, true);                            

    // lengthConfigs.setPropValue("atomLabelBoxExpandRatio",configOrig.textFontConfigs.__$atomLabelBoxExpandRatio, true);
    // lengthConfigs.setPropValue("boldBondLineWidthRatio",configOrig.textFontConfigs.__$boldBondLineWidthRatio, true);
    // lengthConfigs.setPropValue("multipleBondSpacingAbs",configOrig.textFontConfigs.__$multipleBondSpacingAbs, true);
    // console.log(lengthConfigs);

    var colorConfigs = render2DConfigsCurrent.getColorConfigs();
    colorConfigs.setPropValue("useAtomSpecifiedColor",configOrig.colorConfigs.__$useAtomSpecifiedColor, true);
    colorConfigs.setPropValue("labelColor",configOrig.colorConfigs.__$labelColor, true);
    colorConfigs.setPropValue("atomColor",configOrig.colorConfigs.__$atomColor, true);
    colorConfigs.setPropValue("bondColor",configOrig.colorConfigs.__$bondColor, true);
    colorConfigs.setPropValue("glyphStrokeColor",configOrig.colorConfigs.__$glyphStrokeColor, true);
    colorConfigs.setPropValue("glyphFillColor",configOrig.colorConfigs.__$glyphFillColor, true);
    
    // console.log(colorConfigs);
  }

  function makeChemistryViewer(id)
  {
    var viewer = new Kekule.ChemWidget.Viewer(document.getElementById(id));
    // viewer.setDimension('500px', '250px');
    viewer
      .setEnableToolbar(true)
      .setEnableDirectInteraction(true)
      .setEnableEdit(true)
      .setToolbarPos(Kekule.Widget.Position.TOP_RIGHT)
      .setToolbarEvokeModes([Kekule.Widget.EvokeMode.ALWAYS])
      .setToolbarRevokeModes([])
      .setToolButtons([
        'molHideHydrogens','zoomIn', 'zoomOut','rotateLeft', 'rotateRight', 'rotateX', 'rotateY', 'rotateZ','reset', 'openEditor'
      ]);      
      // .setToolButtons([
      //   'molDisplayType', 'molHideHydrogens','zoomIn', 'zoomOut','rotateLeft', 'rotateRight', 'rotateX', 'rotateY', 'rotateZ','reset', 'openEditor', 'config'
      // ]);


    var dialog = viewer.getComposerDialog();
    dialog.getComposer()
      .setEnableStyleToolbar(true)
      .setEnableOperHistory(true)
      .setEnableLoadNewFile(false)
      .setEnableCreateNewDoc(false)
      .setAllowCreateNewChild(true)
      .setCommonToolButtons(['undo', 'redo', 'copy', 'cut', 'paste',
        'zoomIn', 'reset', 'zoomOut', 'objInspector'])   // create all default common tool buttons
      .setChemToolButtons(['manipulate', 'erase', 'bond', 'atom', 'formula',
        'ring', 'charge','glyph', 'textBlock'])   // create only chem tool buttons related to molecule
      .setStyleToolComponentNames(['fontName', 'fontSize', 'color',
        'textDirection', 'textAlign']);
    var mol = new Kekule.Molecule();
    console.log(viewer);
    viewer.setChemObj(mol);
    // viewer.setDimension('500px', '250px');    
    return viewer;
  }
  
