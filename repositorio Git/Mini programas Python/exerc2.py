def classificacao(idade):
    if idade > 0 and idade <= 4:
        return "Você é um bebê"
    elif idade < 13:
        return "Você é uma criança"
    elif idade < 18:
        return "Você é um adolescente"
    elif idade < 60:
        return "Você é um adulto"
    else:
        return "Você é um idoso"

idade = int(input("Digite sua idade: "))
print(classificacao(idade))
