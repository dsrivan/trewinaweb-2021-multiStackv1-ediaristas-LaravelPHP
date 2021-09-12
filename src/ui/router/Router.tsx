import React from "react";
import { Image } from "react-native";
import { NavigationContainer } from "@react-navigation/native";
import { createStackNavigator } from "@react-navigation/stack";
import { NavigationTheme } from "ui/themes/app-theme";

// páginas
import Index from "pages";
import EncontrarDiaristas from "pages/encontrar-diarista";

// Logo
import Logo from "@assets/img/logos/e-diaristas-logo.png";

export type RooTStackParamList = {
  Index: undefined;
  EncontrarDiaristas: undefined;
};

const Stack = createStackNavigator();

const Router: React.FC = () => {
  return (
    <NavigationContainer theme={NavigationTheme}>
      <Stack.Navigator>
        <Stack.Screen
          name={"Index"}
          component={Index}
          options={{
            headerTitleAlign: "center",
            headerTitle: () => (
              <Image
                source={Logo}
                style={{
                  width: 150,
                  height: 50,
                  resizeMode: "contain",
                }}
              />
            ),
          }}
        />
        <Stack.Screen
          name={"EncontrarDiaristas"}
          component={EncontrarDiaristas}
          options={{
            title: "Encontrar Diarista",
          }}
        />
      </Stack.Navigator>
    </NavigationContainer>
  );
};

export default Router;
