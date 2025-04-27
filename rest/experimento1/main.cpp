#include <iostream>
#include <string>
#include <cpr/cpr.h>

int main() {
    cpr::Response response = cpr::Get(cpr::Url{"https://pokeapi.co/api/v2/pokemon/ditto"});

    std::cout << response.text << std::endl;

    return 0;
}