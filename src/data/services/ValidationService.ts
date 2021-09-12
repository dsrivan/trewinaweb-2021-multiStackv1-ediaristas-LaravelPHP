export const ValidationService = {
  cep(cep = ""): boolean {
    return cep.replace(/\D/g, "").length === 8;
    /*
        \D -> busca qualquer coisa que não é número
        \d -> busca números
        g -> flag 'global', procura na string inteira
    */
  },
};
