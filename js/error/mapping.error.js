const errorMessageMap = {
    wronginformations: "❌ Une ou plusieurs informations ne sont pas correctes",
    usernotfound: "❌ Utilisateur introuvable",
    stmtfailed: "❌ Une erreur s'est produite. Veuillez réessayer plus tard, ou contacter le développeur",
    emptyinput: "❌ Un ou plusieurs champs requis sont vides",
    username: "❌ Le nom d'utilsateur n'est pas conforme",
    email: "❌ L'adresse e-mail n'est pas conforme",
    pwdrequirement: "❌ Le mot de passe ne comporte pas les critères attendus",
    passwordmatch: "❌ La confirmation du mot de passe est différente du mot de passe rentré",
    useroremailtaken: "❌ L'adresse e-mail ou le nom d'utilisateur est déjà utilisé",
    filetype: "❌ Le format de document n'est pas autorisé",
    filesize : "❌ Le fichier est trop volumineux, la limite est de 2 Mb",
    nameimage: "❌ Le nom de l'image est déjà pris, elle a peut être déjà été uploadée :)",
    invalidinput: "❌ Un ou plusieurs champs ne sont pas valide, ils comportent peut être des caractères spéciaux",
    contactfailed: "❌ Une erreur s'est produite, vous pouvez nous contacter à contact@logma-production.com",
    missinguserid: "❌ L'utilisateur ne peut pas être supprimé, merci de contacter le développeur en charge",
    ipnotauthorized: "❌ Merci de rentrer votre IP avant de mettre en mode maintenance",
    default: "❌ Une erreur est survenue",
    none: "✅ Opération réalisée avec succès !",
};

export default errorMessageMap;