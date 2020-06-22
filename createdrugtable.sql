



create table drugtable 
	(
		ndc_9_with_dash varchar(10) not null,
		product_type enum('HUMAN OTC DRUG', 'HUMAN PRESCRIPTION DRUG', 'VACCINE', 'PLASMA DERIVATIVE', 'CELLULAR THERAPY', 'NON-STANDARDIZED ALLERGENIC', 'STANDARDIZED ALLERGENIC'),
		proprietary_name varchar(300),
		suffix varchar(170),
		non_proprietary_name varchar(700),
		dosage_form_name enum('INJECTION, SOLUTION', 'CAPSULE', 'CAPSULE, DELAYED RELEASE', 'TABLET', 'TABLET, FILM COATED', 'TABLET, ORALLY DISINTEGRATING', 'POWDER', 'KIT', 'INJECTION, POWDER, LYOPHILIZED, FOR SOLUTION', 'INJECTION, SUSPENSION', 'INJECTION, POWDER, FOR SOLUTION', 'SOLUTION', 'INJECTION', 'CAPSULE, GELATIN COATED', 'POWDER, FOR SOLUTION', 'POWDER, FOR SUSPENSION', 'TABLET, FILM COATED, EXTENDED RELEASE', 'TABLET, CHEWABLE', 'GRANULE, FOR SUSPENSION', 'GRANULE', 'TABLET, EXTENDED RELEASE', 'INJECTION, POWDER, LYOPHILIZED, FOR SUSPENSION', 'CAPSULE, EXTENDED RELEASE', 'TABLET, DELAYED RELEASE', 'GRANULE, DELAYED RELEASE', 'TABLET, SUGAR COATED', 'GRANULE, FOR SOLUTION', 'SUPPOSITORY', 'LOTION', 'GEL', 'CREAM', 'SUSPENSION', 'INHALANT', 'SPRAY, METERED', 'RING', 'OINTMENT', 'SUSPENSION/ DROPS', 'SOLUTION/ DROPS', 'IMPLANT', 'LIQUID', 'EMULSION', 'TAPE', 'PATCH', 'INJECTION, SOLUTION, CONCENTRATE', 'TABLET, COATED', 'SOLUTION, CONCENTRATE', 'SUSPENSION, EXTENDED RELEASE', 'CAPSULE, LIQUID FILLED', 'CAPSULE, DELAYED RELEASE PELLETS', 'GEL, METERED', 'AEROSOL, FOAM', 'TABLET, MULTILAYER, EXTENDED RELEASE', 'INSERT, EXTENDED RELEASE', 'SPRAY', 'CONCENTRATE', 'SYRUP', 'LOZENGE', 'PATCH, EXTENDED RELEASE', 'AEROSOL, SPRAY', 'PILL', 'TABLET, FOR SUSPENSION', 'AEROSOL, METERED', 'AEROSOL', 'TABLET, ORALLY DISINTEGRATING, DELAYED RELEASE', 'INSERT', 'POWDER, METERED', 'SYSTEM', 'CAPSULE, COATED PELLETS', 'SHAMPOO', 'GUM, CHEWING', 'SOLUTION, GEL FORMING / DROPS', 'RINSE', 'ELIXIR', 'GEL, DENTIFRICE', 'MOUTHWASH', 'PASTE, DENTIFRICE', 'ENEMA', 'PASTE', 'BAR, CHEWABLE', 'CREAM, AUGMENTED', 'LOTION, AUGMENTED', 'OINTMENT, AUGMENTED', 'SPRAY, SUSPENSION', 'AEROSOL, POWDER', 'CAPSULE, COATED, EXTENDED RELEASE', 'PELLET', 'TABLET, EFFERVESCENT', 'FOR SUSPENSION', 'IRRIGANT', 'GRANULE, EFFERVESCENT', 'SOAP', 'INJECTION, SUSPENSION, EXTENDED RELEASE', 'LIPSTICK', 'STICK', 'INJECTION, SUSPENSION, LIPOSOMAL', 'INJECTION, EMULSION', 'SALVE', 'OIL', 'CLOTH', 'JELLY', 'DISC', 'PLASTER', 'FILM', 'EXTRACT', 'SWAB', 'TABLET, SOLUBLE', 'TINCTURE', 'TABLET, MULTILAYER', 'STRIP', 'FILM, SOLUBLE', 'GAS', 'FOR SUSPENSION, EXTENDED RELEASE', 'SPONGE', 'SHAMPOO, SUSPENSION', 'LOTION/SHAMPOO', 'PASTILLE', 'INJECTABLE, LIPOSOMAL', 'WAFER', 'TABLET, CHEWABLE, EXTENDED RELEASE', 'LINIMENT', 'DRESSING', 'CAPSULE, COATED', 'FOR SOLUTION', 'CHEWABLE GEL', 'INTRAUTERINE DEVICE', 'GLOBULE', 'POWDER, DENTIFRICE', 'SOLUTION, GEL FORMING, EXTENDED RELEASE', 'POULTICE', 'DOUCHE', 'FILM, EXTENDED RELEASE', 'GRANULE, FOR SUSPENSION, EXTENDED RELEASE', 'CRYSTAL', 'INJECTION, LIPID COMPLEX', 'TROCHE', 'LIQUID, EXTENDED RELEASE'),
		route enum ('SUBCUTANEOUS', 'INTRAVENOUS', 'ORAL', 'NASAL', 'INTRAMUSCULAR; SUBCUTANEOUS', 'INTRAVENOUS; SUBCUTANEOUS', 'INTRAMUSCULAR', 'PARENTERAL', 'TOPICAL', 'INTRA-ARTICULAR; INTRAMUSCULAR', 'INTRA-ARTICULAR; INTRALESIONAL', 'INTRAMUSCULAR; INTRAVENOUS', 'INTRALESIONAL; INTRAMUSCULAR; INTRASYNOVIAL; SOFT TISSUE', 'INTRAMUSCULAR; INTRAVENOUS; SUBCONJUNCTIVAL', 'VAGINAL', 'INTRA-ARTICULAR; INTRALESIONAL; INTRAMUSCULAR; SOFT TISSUE', 'INTRAVASCULAR; INTRAVENOUS', 'INTRACAVERNOUS', 'RESPIRATORY (INHALATION)', 'OPHTHALMIC', 'URETERAL', 'INTRAVASCULAR', 'INTRA-ARTERIAL; INTRAVENOUS', 'ORAL; RECTAL', 'CUTANEOUS', 'INTRADERMAL; INTRAMUSCULAR', 'INTRAVITREAL', 'TRANSDERMAL', 'INTRACAMERAL', 'RECTAL', 'NASOGASTRIC', 'URETHRAL', 'INTRAMUSCULAR; INTRAPLEURAL; INTRATHECAL; INTRAVENOUS', 'INTRAVESICAL', 'PERCUTANEOUS', 'SUBLINGUAL', 'ORAL; TOPICAL', 'AURICULAR (OTIC)', 'ENDOTRACHEAL', 'ENTERAL', 'INTRAMUSCULAR; INTRAVENOUS; SUBCUTANEOUS', 'ORAL; RESPIRATORY (INHALATION)', 'INTRALESIONAL; INTRAMUSCULAR; SUBCUTANEOUS', 'ORAL; TRANSMUCOSAL', 'PERCUTANEOUS; TOPICAL; TRANSDERMAL', 'BUCCAL', 'DENTAL', 'EPIDURAL; INFILTRATION; INTRACAUDAL; PERINEURAL', 'INTRAMUSCULAR; INTRAPLEURAL; INTRAVENOUS; SUBCUTANEOUS', 'INTRA-ARTERIAL', 'INTRACAVITARY; INTRAVENOUS; INTRAVESICAL', 'INTRA-ARTERIAL; INTRAMUSCULAR; INTRATHECAL; INTRAVENOUS', 'INFILTRATION; PERINEURAL', 'EPIDURAL; INFILTRATION; INTRACAUDAL', 'INTRABRONCHIAL', 'INTRACARDIAC; INTRAMUSCULAR; INTRAVENOUS; SUBCUTANEOUS', 'ORAL; SUBLINGUAL', 'IRRIGATION', 'INTRATHECAL', 'INFILTRATION', 'SUBARACHNOID', 'INTRADERMAL', 'PERCUTANEOUS; SUBCUTANEOUS', 'DENTAL; ORAL; PERIODONTAL', 'DENTAL; PERIODONTAL', 'EXTRACORPOREAL', 'SUBMUCOSAL', 'BUCCAL; SUBLINGUAL', 'TRANSMUCOSAL', 'INTRATHECAL; INTRAVASCULAR; INTRAVENOUS; ORAL', 'INTRATHECAL; INTRAVASCULAR; INTRAVENOUS; ORAL; RECTAL', 'INTRAVASCULAR; INTRAVENOUS; ORAL; RECTAL', 'INTRAVASCULAR; INTRAVENOUS; ORAL', 'EPIDURAL; INFILTRATION', 'EPIDURAL; INTRACAUDAL; PERINEURAL', 'PERINEURAL', 'EPIDURAL; RETROBULBAR', 'EPIDURAL', 'ENDOTRACHEAL; INTRAMUSCULAR; INTRAVENOUS; SUBCUTANEOUS', 'INTRAVENOUS; PARENTERAL', 'EPIDURAL; INTRAVENOUS', 'EPIDURAL; INTRATHECAL; INTRAVENOUS', 'INFILTRATION; INTRAVENOUS', 'RETROBULBAR; TOPICAL', 'INTRASPINAL', 'ENDOTRACHEAL; INTRACARDIAC; INTRAVENOUS', 'INTRAVENOUS; INTRAVENTRICULAR', 'EPIDURAL; INFILTRATION; PERINEURAL', 'EPIDURAL; PERINEURAL', 'OPHTHALMIC; ORAL; TOPICAL', 'OPHTHALMIC; TOPICAL', 'INTRA-ARTICULAR; INTRALESIONAL; INTRAMUSCULAR', 'ORAL; ORAL', 'OROPHARYNGEAL', 'EPIDURAL; INTRATHECAL', 'INTRA-ARTICULAR; INTRALESIONAL; INTRAMUSCULAR; INTRAVENOUS; SOFT TISSUE', 'PERIODONTAL', 'INTRAMUSCULAR; INTRAVENOUS; PARENTERAL', 'INTRAVENOUS; ORAL', 'TOPICAL; TOPICAL', 'RECTAL; TOPICAL', 'INTRAPERITONEAL', 'DENTAL; PERIODONTAL; SUBGINGIVAL', 'DENTAL; ORAL; PERIODONTAL; SUBGINGIVAL', 'INTRASINAL', 'BUCCAL; DENTAL; TOPICAL', 'INTRACORONARY; RESPIRATORY (INHALATION)', 'CUTANEOUS; RESPIRATORY (INHALATION)', 'INFILTRATION; INTRAMUSCULAR', 'INTRAVENTRICULAR', 'INTRAOCULAR', 'INTRADERMAL; PERCUTANEOUS; SUBCUTANEOUS', 'INTRACAVITARY', 'INTRAMUSCULAR; INTRATHECAL; INTRAVENOUS; OPHTHALMIC', 'INTRAMUSCULAR; INTRAVENOUS; RECTAL', 'INTRADERMAL; SUBCUTANEOUS', 'CUTANEOUS; INTRADERMAL; SUBCUTANEOUS', 'ELECTRO-OSMOSIS', 'INTRA-ARTICULAR; INTRADERMAL; INTRAMUSCULAR; INTRAVENOUS; SUBCUTANEOUS', 'INTRADERMAL; INTRAMUSCULAR; INTRAVENOUS; SUBCUTANEOUS', 'INTRAUTERINE', 'NASOGASTRIC; ORAL', 'INTRAMUSCULAR; INTRAVITREAL', 'DENTAL; ORAL', 'NASAL; ORAL', 'EPIDURAL; INTRACAUDAL', 'CUTANEOUS; TOPICAL; TRANSDERMAL', 'INTRALESIONAL', 'HEMODIALYSIS', 'HEMODIALYSIS; INTRAVENOUS', 'PERCUTANEOUS; TRANSDERMAL', 'DENTAL; TOPICAL', 'INTRATHECAL; INTRAVENOUS; SUBCUTANEOUS', 'INTRA-ARTERIAL; INTRAMUSCULAR; INTRAVENOUS', 'DENTAL; SUBLINGUAL', 'DENTAL; SUBLINGUAL; TOPICAL', 'TOPICAL; TRANSDERMAL', 'INTRAMUSCULAR; INTRATHECAL; INTRAVENOUS', 'ENDOTRACHEAL; INTRAMEDULLARY; INTRAMUSCULAR; INTRAVENOUS; SUBCUTANEOUS', 'INTRAVENOUS; RESPIRATORY (INHALATION)', 'CUTANEOUS; IRRIGATION; OPHTHALMIC; TOPICAL', 'INTERSTITIAL; INTRAVASCULAR', 'INTRA-ARTERIAL; INTRALYMPHATIC; INTRAUTERINE', 'INTRAMUSCULAR; INTRAMUSCULAR; INTRAVENOUS', 'TOPICAL; TOPICAL; TOPICAL', 'SUBLINGUAL; SUBLINGUAL', 'SUBLINGUAL; SUBLINGUAL; SUBLINGUAL', 'ORAL; ORAL; ORAL', 'SUBLINGUAL; SUBLINGUAL; SUBLINGUAL; SUBLINGUAL', 'INTRAOCULAR; OPHTHALMIC', 'DENTAL; ORAL; TOPICAL', 'TOPICAL; VAGINAL', 'INTRA-ARTICULAR', 'INTRAPERITONEAL; INTRAVENOUS', 'CUTANEOUS; TOPICAL', 'INTRA-ARTICULAR; INTRALESIONAL; INTRAMUSCULAR; INTRASYNOVIAL; SOFT TISSUE', 'NASAL; RESPIRATORY (INHALATION)', 'INTRACANALICULAR; OPHTHALMIC', 'INFILTRATION; SOFT TISSUE; TOPICAL', 'CUTANEOUS; EXTRACORPOREAL; VAGINAL', 'INTRAVENOUS; INTRAVESICAL; OPHTHALMIC', 'CUTANEOUS; EXTRACORPOREAL; TOPICAL; VAGINAL', 'INTRACARDIAC; INTRAVENOUS', 'EXTRACORPOREAL; TOPICAL', 'CUTANEOUS; EXTRACORPOREAL', 'BUCCAL; VAGINAL', 'RECTAL; VAGINAL', 'INTRAMUSCULAR; INTRAVENOUS; PARENTERAL; SUBCUTANEOUS', 'EPIDURAL; INFILTRATION; INTRAMUSCULAR; INTRAVENOUS; PERINEURAL; TOPICAL', 'EPIDURAL; INFILTRATION; INTRAMUSCULAR; INTRASYNOVIAL; SOFT TISSUE; TOPICAL', 'INFILTRATION; INTRA-ARTICULAR; INTRAMUSCULAR; RESPIRATORY (INHALATION); TOPICAL', 'INTRAMUSCULAR; SUBCUTANEOUS; TOPICAL', 'INTRAMUSCULAR; INTRAOCULAR; SUBCUTANEOUS', 'EPIDURAL; INTRA-ARTICULAR; INTRAMUSCULAR; TOPICAL', 'EPIDURAL; INFILTRATION; TOPICAL', 'EPIDURAL; INFILTRATION; INTRA-ARTICULAR; INTRAMUSCULAR', 'EPIDURAL; INFILTRATION; INTRA-ARTICULAR; INTRAMUSCULAR; TOPICAL', 'EPIDURAL; INFILTRATION; INTRA-ARTICULAR; INTRALESIONAL; INTRAMUSCULAR; INTRAVENOUS; SOFT TISSUE; SUBCUTANEOUS; TOPICAL', 'INFILTRATION; INTRA-ARTICULAR; INTRALESIONAL; INTRAMUSCULAR; PERINEURAL; TOPICAL', 'INTRAMUSCULAR; INTRAVENOUS; TOPICAL', 'INFILTRATION; INTRAMUSCULAR; INTRAVENOUS; TOPICAL', 'EPIDURAL; INFILTRATION; INTRAMUSCULAR; INTRAVENOUS; TOPICAL', 'INFILTRATION; INTRA-ARTICULAR; INTRALESIONAL; INTRAMUSCULAR; SOFT TISSUE; TOPICAL', 'EPIDURAL; INFILTRATION; INTRA-ARTICULAR; INTRALESIONAL; INTRAMUSCULAR; TOPICAL', 'EPIDURAL; INFILTRATION; INTRA-ARTICULAR; INTRALESIONAL; INTRAMUSCULAR; SOFT TISSUE; TOPICAL', 'SUBGINGIVAL', 'TOPICAL; URETERAL; VAGINAL', NULL),
		start_marketing_date date not null,
		end_marketing_date date null,
		marketing_category enum('NDA', 'BLA', 'NDA AUTHORIZED GENERIC', 'OTC MONOGRAPH NOT FINAL', 'ANDA', 'OTC MONOGRAPH FINAL', 'UNAPPROVED DRUG OTHER', 'UNAPPROVED DRUG FOR USE IN DRUG SHORTAGE', 'UNAPPROVED HOMEOPATHIC', 'UNAPPROVED MEDICAL GAS'),
		application_number varchar(20) null,
		











		



		)Engine=InnoDB;