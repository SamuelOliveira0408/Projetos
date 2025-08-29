def bissexto(ano):
    if ano % 4 == 0 and (ano % 400 == 0 or ano % 100 != 0):
        return "é um ano bissexto"
    else:
        return "não é um ano bissexto"

ano = int(input("Digite um ano para verificar se ele é bissexto: "))
print(bissexto(ano))
