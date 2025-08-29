def ingresso(idade, filme):
    if idade < 14:
        c = "criança" 
    elif idade < 61:
        c = "jovem"
    else:
        c = "idoso"

    if c=="criança" and filme == "infantil":
        preco = "o valor do ingresso é R$12,00"
    else:
        preco = "o valor do ingresso é R$24,00"

    if c=="jovem":
        preco= "o valor do ingresso é R$24,00"

    elif c=="idoso":
        preco="o valor do ingresso é R$15,00"
        
    return preco

idade = int(input("Digite a sua idade para o cálculo do ingresso: "))
filme = input("Digite o tipo de filme: (infantil, normal ou senior): ")
print(ingresso(idade, filme))
